<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Http;

use GoSuccess\Digistore24\Api\Enum\HttpStatusCode;

/**
 * HTTP Response
 *
 * Represents a response from the Digistore24 API.
 * Uses PHP 8.4 property hooks for computed properties.
 */
final class Response
{
    /**
     * HTTP status code (raw integer)
     */
    public readonly int $statusCode;

    /**
     * HTTP status code (typed enum, computed)
     */
    public ?HttpStatusCode $status {
        get {
            $enum = HttpStatusCode::fromInt($this->statusCode);
            return $enum instanceof HttpStatusCode ? $enum : null;
        }
    }

    /**
     * Response data
     *
     * @var array<string, mixed>
     */
    public readonly array $data;

    /**
     * Response headers
     *
     * @var array<string, string[]>
     */
    public readonly array $headers;

    /**
     * Raw response body
     */
    public readonly string $rawBody;

    /**
     * Check if response was successful (2xx status code)
     */
    public bool $isSuccess {
        get {
            $status = $this->status;
            return $status instanceof HttpStatusCode && $status->isSuccess()
                ? true
                : ($this->statusCode >= 200 && $this->statusCode < 300);
        }
    }

    /**
     * Check if response is a client error (4xx status code)
     */
    public bool $isClientError {
        get {
            $status = $this->status;
            return $status instanceof HttpStatusCode && $status->isClientError()
                ? true
                : ($this->statusCode >= 400 && $this->statusCode < 500);
        }
    }

    /**
     * Check if response is a server error (5xx status code)
     */
    public bool $isServerError {
        get {
            $status = $this->status;
            return $status instanceof HttpStatusCode && $status->isServerError()
                ? true
                : ($this->statusCode >= 500 && $this->statusCode < 600);
        }
    }

    /**
     * @param int $statusCode HTTP status code
     * @param array<string, mixed> $data Response data
     * @param array<string, string[]> $headers Response headers
     * @param string $rawBody Raw response body
     */
    public function __construct(
        int $statusCode,
        array $data,
        array $headers = [],
        string $rawBody = '',
    ) {
        $this->statusCode = $statusCode;
        $this->data = $data;
        $this->headers = $headers;
        $this->rawBody = $rawBody;
    }

    /**
     * Get specific header value
     */
    public function getHeader(string $name): ?string
    {
        $name = strtolower($name);
        foreach ($this->headers as $key => $values) {
            if (strtolower($key) === $name) {
                return $values[0] ?? null;
            }
        }

        return null;
    }
}
