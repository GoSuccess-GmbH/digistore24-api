<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Sdk;

use Exception;
use Throwable;

class DigistoreApiException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param array<string, mixed>|null $context Additional context information
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message,
        int $code = 0,
        private readonly ?array $context = null,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get additional context information
     *
     * @return array<string, mixed>|null
     */
    public function getContext(): ?array
    {
        return $this->context;
    }
}
