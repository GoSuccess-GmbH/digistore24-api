<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Exception;

/**
 * Thrown when request validation fails (HTTP 400)
 */
class ValidationException extends ApiException
{
    /**
     * Get validation errors
     * 
     * @return array<string, string[]>
     */
    public function getErrors(): array
    {
        return $this->getContextValue('errors', []);
    }
}
