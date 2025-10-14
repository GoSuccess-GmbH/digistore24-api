<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Client;

use GoSuccess\Digistore24\Api\Exception\ApiException;
use GoSuccess\Digistore24\Api\Exception\AuthenticationException;
use GoSuccess\Digistore24\Api\Exception\ForbiddenException;
use GoSuccess\Digistore24\Api\Exception\NotFoundException;
use GoSuccess\Digistore24\Api\Exception\RateLimitException;
use GoSuccess\Digistore24\Api\Exception\RequestException;
use GoSuccess\Digistore24\Api\Exception\ValidationException;
use GoSuccess\Digistore24\Api\Http\Method;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Http\StatusCode;

/**
 * HTTP Client for Digistore24 API
 * 
 * Handles all HTTP communication with the Digistore24 API using cURL.
 * Features:
 * - Automatic retries with exponential backoff
 * - Rate limit handling
 * - Type-safe responses
 * - Comprehensive error handling
 */
class ApiClient
{
    private const string API_VERSION = '1.0';
    private const string USER_AGENT = 'GoSuccess-Digistore24-PHP-SDK/2.0';

    /**
     * @param Configuration $config API configuration
     */
    public function __construct(
        private readonly Configuration $config
    ) {
        if (!extension_loaded('curl')) {
            throw new RequestException(
                'cURL extension is required but not loaded',
                0,
                ['extension' => 'curl']
            );
        }
    }

    /**
     * Send a request to the API
     * 
     * @param string $endpoint API endpoint (e.g., 'createBuyUrl')
     * @param Method $method HTTP method
     * @param array<string, mixed> $params Request parameters
     * @return Response
     * @throws ApiException
     */
    public function request(
        string $endpoint,
        Method $method = Method::POST,
        array $params = []
    ): Response {
        $url = $this->buildUrl($endpoint);
        $attempt = 0;
        $lastException = null;

        while ($attempt < $this->config->maxRetries) {
            $attempt++;

            try {
                return $this->executeRequest($url, $method, $params);
            } catch (RateLimitException $e) {
                $lastException = $e;
                $retryAfter = $e->getRetryAfter() ?? 5;
                
                if ($attempt < $this->config->maxRetries) {
                    $this->log("Rate limit hit, waiting {$retryAfter}s before retry");
                    sleep($retryAfter);
                    continue;
                }
                throw $e;
            } catch (RequestException $e) {
                $lastException = $e;
                
                if ($attempt < $this->config->maxRetries) {
                    $backoff = $this->calculateBackoff($attempt);
                    $this->log("Request failed, retrying in {$backoff}s (attempt {$attempt})");
                    sleep($backoff);
                    continue;
                }
                throw $e;
            }
        }

        throw $lastException ?? new RequestException('Request failed after all retries');
    }

    /**
     * Execute single HTTP request
     * 
     * @throws ApiException
     */
    private function executeRequest(string $url, Method $method, array $params): Response
    {
        $ch = curl_init();

        // Build query string and prepare body
        $queryString = http_build_query($this->addMetaParams($params), '', '&');

        // Set cURL options
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $this->config->timeout,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method->value,
            CURLOPT_USERAGENT => self::USER_AGENT,
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Accept-Charset: utf-8',
                'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
                "X-DS-API-KEY: {$this->config->apiKey}",
            ],
        ];

        // Add body for POST/PUT/PATCH
        if (in_array($method, [Method::POST, Method::PUT, Method::PATCH], true)) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $queryString;
        } elseif ($method === Method::GET && !empty($params)) {
            $options[CURLOPT_URL] = "{$url}?{$queryString}";
        }

        curl_setopt_array($ch, $options);

        // Execute request
        $response = curl_exec($ch);
        $curlErrno = curl_errno($ch);
        $curlError = curl_error($ch);
        $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $headerSize = (int) curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        curl_close($ch);

        // Handle cURL errors
        if ($curlErrno !== 0 || $response === false) {
            throw new RequestException(
                "cURL error: {$curlError}",
                $curlErrno,
                ['curl_errno' => $curlErrno, 'curl_error' => $curlError]
            );
        }

        // Parse response
        $headers = $this->parseHeaders(substr((string) $response, 0, $headerSize));
        $body = substr((string) $response, $headerSize);

        $bodyPreview = substr($body, 0, 500);
        $this->log("Response: HTTP {$httpCode}");
        $this->log("Body: {$bodyPreview}");

        // Parse JSON
        $data = json_decode($body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $jsonError = json_last_error_msg();
            $bodyPreview = substr($body, 0, 1000);
            throw new ApiException(
                'Invalid JSON response from API',
                0,
                ['json_error' => $jsonError, 'body' => $bodyPreview]
            );
        }

        $response = new Response(
            statusCode: $httpCode,
            data: $data ?? [],
            headers: $headers,
            rawBody: $body
        );

        // Handle HTTP errors
        $this->handleHttpErrors($response);

        // Handle API errors
        $this->handleApiErrors($response);

        return $response;
    }

    /**
     * Handle HTTP-level errors
     * 
     * @throws ApiException
     */
    private function handleHttpErrors(Response $response): void
    {
        $statusCode = StatusCode::fromInt($response->statusCode);

        match ($statusCode) {
            StatusCode::UNAUTHORIZED => throw new AuthenticationException(
                'Invalid or missing API key',
                StatusCode::UNAUTHORIZED->value,
                ['status_code' => StatusCode::UNAUTHORIZED->value]
            ),
            StatusCode::FORBIDDEN => throw new ForbiddenException(
                'Access forbidden - insufficient permissions',
                StatusCode::FORBIDDEN->value,
                ['status_code' => StatusCode::FORBIDDEN->value]
            ),
            StatusCode::NOT_FOUND => throw new NotFoundException(
                'Resource not found',
                StatusCode::NOT_FOUND->value,
                ['status_code' => StatusCode::NOT_FOUND->value]
            ),
            StatusCode::TOO_MANY_REQUESTS => throw new RateLimitException(
                'Rate limit exceeded',
                StatusCode::TOO_MANY_REQUESTS->value,
                [
                    'status_code' => StatusCode::TOO_MANY_REQUESTS->value,
                    'retry_after' => (int) ($response->getHeader('Retry-After') ?? 60),
                ]
            ),
            default => null,
        };

        // Handle server errors (5xx)
        if ($statusCode?->isServerError() ?? false) {
            throw new ApiException(
                'Server error',
                $response->statusCode,
                ['status_code' => $response->statusCode]
            );
        }
    }

    /**
     * Handle API-level errors (from response body)
     * 
     * @throws ApiException
     */
    private function handleApiErrors(Response $response): void
    {
        // Check for error in response
        if (isset($response->data['result']) && $response->data['result'] === 'error') {
            $message = $response->data['message'] ?? 'Unknown API error';
            $code = (int) ($response->data['code'] ?? 0);

            throw new ApiException(
                $message,
                $code,
                ['api_error' => $response->data]
            );
        }

        // Validate response structure
        if (!isset($response->data['result']) || !isset($response->data['data'])) {
            throw new ApiException(
                'Invalid API response structure',
                0,
                ['response' => $response->data]
            );
        }
    }

    /**
     * Build full API URL
     */
    private function buildUrl(string $endpoint): string
    {
        $cleanEndpoint = ltrim($endpoint, '/');
        return "{$this->config->apiUrl}/{$cleanEndpoint}";
    }

    /**
     * Add meta parameters to request
     * 
     * @param array<string, mixed> $params
     * @return array<string, mixed>
     */
    private function addMetaParams(array $params): array
    {
        $meta = [
            'language' => $this->config->language,
            'ds24ver' => self::API_VERSION,
        ];

        if ($this->config->operatorName !== null) {
            $meta['operator'] = $this->config->operatorName;
        }

        return array_merge($params, $meta);
    }

    /**
     * Calculate exponential backoff time
     */
    private function calculateBackoff(int $attempt): int
    {
        return min(2 ** $attempt, 30); // Max 30 seconds
    }

    /**
     * Parse HTTP headers
     * 
     * @return array<string, string[]>
     */
    private function parseHeaders(string $headerText): array
    {
        $headers = [];
        $lines = explode("\r\n", $headerText);

        foreach ($lines as $line) {
            if (str_contains($line, ':')) {
                [$name, $value] = explode(':', $line, 2);
                $name = trim($name);
                $value = trim($value);
                $headers[$name][] = $value;
            }
        }

        return $headers;
    }

    /**
     * Log debug message
     */
    private function log(string $message): void
    {
        if ($this->config->debug) {
            error_log("[Digistore24 API] {$message}");
        }
    }
}
