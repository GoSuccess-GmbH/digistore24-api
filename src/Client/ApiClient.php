<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Client;

use GoSuccess\Digistore24\Api\Contract\HttpClientInterface;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;
use GoSuccess\Digistore24\Api\Enum\HttpStatusCode;
use GoSuccess\Digistore24\Api\Exception\ApiException;
use GoSuccess\Digistore24\Api\Exception\AuthenticationException;
use GoSuccess\Digistore24\Api\Exception\ForbiddenException;
use GoSuccess\Digistore24\Api\Exception\NotFoundException;
use GoSuccess\Digistore24\Api\Exception\RateLimitException;
use GoSuccess\Digistore24\Api\Exception\RequestException;
use GoSuccess\Digistore24\Api\Http\Request;
use GoSuccess\Digistore24\Api\Http\Response;

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
final class ApiClient implements HttpClientInterface
{
    private const string USER_AGENT = 'GoSuccess-Digistore24-API-Client/2.0 (https://github.com/GoSuccessHQ/digistore24-api)';

    /**
     * @param Configuration $config API configuration
     */
    public function __construct(
        private readonly Configuration $config,
    ) {
        if (! extension_loaded('curl')) {
            throw new RequestException(
                'cURL extension is required but not loaded',
                0,
                ['extension' => 'curl'],
            );
        }
    }

    /**
     * Send a request to the API
     *
     * @param string $endpoint API endpoint (e.g., 'createBuyUrl')
     * @param HttpMethod $method HTTP method
     * @param array<string, mixed> $params Request parameters
     * @throws ApiException
     * @return Response
     */
    public function request(
        string $endpoint,
        HttpMethod $method = HttpMethod::POST,
        array $params = [],
    ): Response {
        $request = $this->buildRequest($endpoint, $method, $params);

        return $this->send($request);
    }

    /**
     * Send an HTTP request with retry logic
     *
     * @throws ApiException
     */
    public function send(Request $request): Response
    {
        $attempt = 0;
        $lastException = null;

        while ($attempt < $this->config->maxRetries) {
            $attempt++;

            try {
                return $this->executeRequest($request);
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
     * Build HTTP request from endpoint and parameters
     *
     * @param array<string, mixed> $params
     */
    private function buildRequest(string $endpoint, HttpMethod $method, array $params): Request
    {
        $url = $this->buildUrl($endpoint);

        $headers = [
            'Accept' => 'application/json',
            'Accept-Charset' => 'utf-8',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
            'X-DS-API-KEY' => $this->config->apiKey,
            'User-Agent' => self::USER_AGENT,
        ];

        // For GET requests, use query parameters
        if ($method === HttpMethod::GET) {
            // Filter and ensure only scalar values for query parameters
            $query = [];
            foreach ($params as $key => $value) {
                if (is_bool($value) || is_int($value) || is_string($value)) {
                    $query[$key] = $value;
                }
            }

            return new Request(
                method: $method,
                url: $url,
                headers: $headers,
                query: $query,
            );
        }

        // For POST/PUT/PATCH, use body
        return new Request(
            method: $method,
            url: $url,
            body: $params,
            headers: $headers,
        );
    }

    /**
     * Execute single HTTP request
     *
     * @throws ApiException
     */
    private function executeRequest(Request $request): Response
    {
        $ch = curl_init();

        // Build query string for body/query
        $queryString = $request->hasBody
            ? http_build_query($request->body, '', '&')
            : http_build_query($request->query, '', '&');

        // Build URL with query parameters for GET requests
        $url = $request->isGet && $request->hasQuery
            ? $request->fullUrl
            : $request->url;

        // Ensure URL is not empty
        if ($url === '') {
            throw new RequestException('URL cannot be empty', 0, ['url' => $url]);
        }

        // Convert headers array to cURL format
        $curlHeaders = [];
        foreach ($request->headers as $name => $value) {
            $curlHeaders[] = "{$name}: {$value}";
        }

        // Set cURL options
        /** @var array<int, mixed> */
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $this->config->timeout,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $request->method->value,
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $curlHeaders,
        ];

        // Add body for POST/PUT/PATCH
        if ($request->hasBody && ! $request->isGet) {
            $options[CURLOPT_POST] = $request->method === HttpMethod::POST;
            $options[CURLOPT_POSTFIELDS] = $queryString;
        }

        curl_setopt_array($ch, $options);

        // Execute request
        $response = curl_exec($ch);
        $curlErrno = curl_errno($ch);
        $curlError = curl_error($ch);
        $httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $headerSize = (int)curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        curl_close($ch);

        // Handle cURL errors
        if ($curlErrno !== 0 || $response === false) {
            throw new RequestException(
                "cURL error: {$curlError}",
                $curlErrno,
                ['curl_errno' => $curlErrno, 'curl_error' => $curlError],
            );
        }

        // Parse response
        $headers = $this->parseHeaders(substr((string)$response, 0, $headerSize));
        $body = substr((string)$response, $headerSize);

        $bodyPreview = substr($body, 0, 500);
        $this->log("Response: HTTP {$httpCode}");
        $this->log("Body: {$bodyPreview}");

        // Parse JSON
        $data = json_decode($body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $jsonError = json_last_error_msg();
            $bodyPreview = substr($body, 0, 500);

            throw new ApiException(
                sprintf(
                    'Invalid JSON response from API: %s. Body preview: %s',
                    $jsonError,
                    $bodyPreview,
                ),
                0,
                [
                    'json_error' => $jsonError,
                    'body' => $bodyPreview,
                    'status_code' => $httpCode,
                ],
            );
        }

        // Ensure data is an array
        if (! is_array($data)) {
            $data = [];
        }
        /** @var array<string, mixed> $validatedData */
        $validatedData = $data;

        $response = new Response(
            statusCode: $httpCode,
            data: $validatedData,
            headers: $headers,
            rawBody: $body,
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
        $statusCode = HttpStatusCode::fromInt($response->statusCode);

        match ($statusCode) {
            HttpStatusCode::UNAUTHORIZED => throw new AuthenticationException(
                'Invalid or missing API key',
                HttpStatusCode::UNAUTHORIZED->value,
                ['status_code' => HttpStatusCode::UNAUTHORIZED->value],
            ),
            HttpStatusCode::FORBIDDEN => throw new ForbiddenException(
                'Access forbidden - insufficient permissions',
                HttpStatusCode::FORBIDDEN->value,
                ['status_code' => HttpStatusCode::FORBIDDEN->value],
            ),
            HttpStatusCode::NOT_FOUND => throw new NotFoundException(
                'Resource not found',
                HttpStatusCode::NOT_FOUND->value,
                ['status_code' => HttpStatusCode::NOT_FOUND->value],
            ),
            HttpStatusCode::TOO_MANY_REQUESTS => throw new RateLimitException(
                'Rate limit exceeded',
                HttpStatusCode::TOO_MANY_REQUESTS->value,
                [
                    'status_code' => HttpStatusCode::TOO_MANY_REQUESTS->value,
                    'retry_after' => (int)($response->getHeader('Retry-After') ?? 60),
                ],
            ),
            default => null,
        };

        // Handle server errors (5xx)
        if ($statusCode?->isServerError() ?? false) {
            throw new ApiException(
                'Server error',
                $response->statusCode,
                ['status_code' => $response->statusCode],
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
            $code = $response->data['code'] ?? 0;

            throw new ApiException(
                is_string($message) ? $message : 'Unknown API error',
                is_int($code) ? $code : (is_numeric($code) ? (int)$code : 0),
                ['api_error' => $response->data],
            );
        }

        // Validate response structure
        if (! isset($response->data['result']) || ! isset($response->data['data'])) {
            throw new ApiException(
                'Invalid API response structure',
                0,
                ['response' => $response->data],
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
     * Calculate exponential backoff time
     */
    private function calculateBackoff(int $attempt): int
    {
        return (int)min(2 ** $attempt, 30); // Max 30 seconds
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
