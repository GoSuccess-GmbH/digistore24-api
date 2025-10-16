<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Http;

use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * HTTP Request
 *
 * Represents an HTTP request to the Digistore24 API.
 * Uses PHP 8.4 property hooks for computed properties.
 */
final class Request
{
    /**
     * HTTP method
     */
    public readonly HttpMethod $method;

    /**
     * Request URL/endpoint
     */
    public readonly string $url;

    /**
     * Request headers
     *
     * @var array<string, string>
     */
    public readonly array $headers;

    /**
     * Request body/payload
     *
     * @var array<string, mixed>
     */
    public readonly array $body;

    /**
     * Query parameters
     *
     * @var array<string, string|int|bool>
     */
    public readonly array $query;

    /**
     * Check if request has a body
     */
    public bool $hasBody {
        get => !empty($this->body);
    }

    /**
     * Check if request has query parameters
     */
    public bool $hasQuery {
        get => !empty($this->query);
    }

    /**
     * Get full URL with query parameters
     */
    public string $fullUrl {
        get {
            if (!$this->hasQuery) {
                return $this->url;
            }

            $queryString = http_build_query($this->query);
            $separator = str_contains($this->url, '?') ? '&' : '?';

            return $this->url . $separator . $queryString;
        }
    }

    /**
     * Check if request is GET method
     */
    public bool $isGet {
        get => $this->method === HttpMethod::GET;
    }

    /**
     * Check if request is POST method
     */
    public bool $isPost {
        get => $this->method === HttpMethod::POST;
    }

    /**
     * Check if request is PUT method
     */
    public bool $isPut {
        get => $this->method === HttpMethod::PUT;
    }

    /**
     * Check if request is DELETE method
     */
    public bool $isDelete {
        get => $this->method === HttpMethod::DELETE;
    }

    /**
     * @param HttpMethod $method HTTP method
     * @param string $url Request URL/endpoint
     * @param array<string, mixed> $body Request body/payload
     * @param array<string, string> $headers Request headers
     * @param array<string, string|int|bool> $query Query parameters
     */
    public function __construct(
        HttpMethod $method,
        string $url,
        array $body = [],
        array $headers = [],
        array $query = [],
    ) {
        $this->method = $method;
        $this->url = $url;
        $this->body = $body;
        $this->headers = $headers;
        $this->query = $query;
    }

    /**
     * Get specific header value
     */
    public function getHeader(string $name): ?string
    {
        $name = strtolower($name);
        foreach ($this->headers as $key => $value) {
            if (strtolower($key) === $name) {
                return $value;
            }
        }

        return null;
    }

    /**
     * Check if header exists
     */
    public function hasHeader(string $name): bool
    {
        return $this->getHeader($name) !== null;
    }

    /**
     * Create a new request with additional headers
     *
     * @param array<string, string> $headers
     */
    public function withHeaders(array $headers): self
    {
        return new self(
            method: $this->method,
            url: $this->url,
            body: $this->body,
            headers: array_merge($this->headers, $headers),
            query: $this->query,
        );
    }

    /**
     * Create a new request with additional query parameters
     *
     * @param array<string, string|int|bool> $query
     */
    public function withQuery(array $query): self
    {
        return new self(
            method: $this->method,
            url: $this->url,
            body: $this->body,
            headers: $this->headers,
            query: array_merge($this->query, $query),
        );
    }

    /**
     * Create a new request with a different body
     *
     * @param array<string, mixed> $body
     */
    public function withBody(array $body): self
    {
        return new self(
            method: $this->method,
            url: $this->url,
            body: $body,
            headers: $this->headers,
            query: $this->query,
        );
    }
}
