<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Http;

/**
 * HTTP Response
 * 
 * Represents a response from the Digistore24 API
 */
readonly class Response
{
    /**
     * @param int $statusCode HTTP status code
     * @param array<string, mixed> $data Response data
     * @param array<string, string[]> $headers Response headers
     * @param string $rawBody Raw response body
     */
    public function __construct(
        public int $statusCode,
        public array $data,
        public array $headers = [],
        public string $rawBody = '',
    ) {
    }

    /**
     * Check if response was successful (2xx status code)
     */
    public function isSuccess(): bool
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }

    /**
     * Check if response is a client error (4xx status code)
     */
    public function isClientError(): bool
    {
        return $this->statusCode >= 400 && $this->statusCode < 500;
    }

    /**
     * Check if response is a server error (5xx status code)
     */
    public function isServerError(): bool
    {
        return $this->statusCode >= 500 && $this->statusCode < 600;
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
