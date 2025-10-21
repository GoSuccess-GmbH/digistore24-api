<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Exception;

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
        $errors = $this->getContextValue('errors', []);

        if (! is_array($errors)) {
            return [];
        }

        // Ensure proper structure: array<string, string[]>
        /** @var array<string, string[]> */
        return $errors;
    }
}
