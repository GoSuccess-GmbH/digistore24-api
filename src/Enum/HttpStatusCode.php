<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * HTTP Status Codes
 *
 * Type-safe enum for HTTP status codes used in API responses.
 */
enum HttpStatusCode: int
{
    // Success
    case OK = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case NO_CONTENT = 204;

    // Client Errors
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case CONFLICT = 409;
    case UNPROCESSABLE_ENTITY = 422;
    case TOO_MANY_REQUESTS = 429;

    // Server Errors
    case INTERNAL_SERVER_ERROR = 500;
    case BAD_GATEWAY = 502;
    case SERVICE_UNAVAILABLE = 503;
    case GATEWAY_TIMEOUT = 504;

    /**
     * Check if status code indicates success (2xx)
     */
    public function isSuccess(): bool
    {
        return match ($this) {
            self::OK, self::CREATED, self::ACCEPTED, self::NO_CONTENT => true,
            default => false,
        };
    }

    /**
     * Check if status code indicates client error (4xx)
     */
    public function isClientError(): bool
    {
        return match ($this) {
            self::BAD_REQUEST, self::UNAUTHORIZED, self::FORBIDDEN,
            self::NOT_FOUND, self::METHOD_NOT_ALLOWED,
            self::CONFLICT, self::UNPROCESSABLE_ENTITY, self::TOO_MANY_REQUESTS => true,
            default => false,
        };
    }

    /**
     * Check if status code indicates server error (5xx)
     */
    public function isServerError(): bool
    {
        return match ($this) {
            self::INTERNAL_SERVER_ERROR, self::BAD_GATEWAY,
            self::SERVICE_UNAVAILABLE, self::GATEWAY_TIMEOUT => true,
            default => false,
        };
    }

    /**
     * Get human-readable description
     */
    public function description(): string
    {
        return match ($this) {
            self::OK => 'OK',
            self::CREATED => 'Created',
            self::ACCEPTED => 'Accepted',
            self::NO_CONTENT => 'No Content',
            self::BAD_REQUEST => 'Bad Request',
            self::UNAUTHORIZED => 'Unauthorized',
            self::FORBIDDEN => 'Forbidden',
            self::NOT_FOUND => 'Not Found',
            self::METHOD_NOT_ALLOWED => 'Method Not Allowed',
            self::CONFLICT => 'Conflict',
            self::UNPROCESSABLE_ENTITY => 'Unprocessable Entity',
            self::TOO_MANY_REQUESTS => 'Too Many Requests',
            self::INTERNAL_SERVER_ERROR => 'Internal Server Error',
            self::BAD_GATEWAY => 'Bad Gateway',
            self::SERVICE_UNAVAILABLE => 'Service Unavailable',
            self::GATEWAY_TIMEOUT => 'Gateway Timeout',
        };
    }

    /**
     * Create from integer (safe)
     */
    public static function fromInt(int $code): ?self
    {
        return self::tryFrom($code);
    }
}
