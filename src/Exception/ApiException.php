<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Exception;

use Throwable;

/**
 * Base exception for all Digistore24 API errors
 */
class ApiException extends \Exception
{
    /**
     * @param string $message Error message
     * @param int $code Error code
     * @param array<string, mixed> $context Additional error context
     * @param Throwable|null $previous Previous exception for chaining
     */
    public function __construct(
        string $message = '',
        int $code = 0,
        protected array $context = [],
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get error context
     *
     * @return array<string, mixed>
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * Get specific context value
     *
     * @param string $key Context key to retrieve
     * @param mixed $default Default value if key not found (explicitly pass null if no default needed)
     * @return mixed The context value or default
     */
    public function getContextValue(string $key, mixed $default): mixed
    {
        return $this->context[$key] ?? $default;
    }
}
