<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Contract;

/**
 * Validatable Interface
 *
 * Defines a contract for objects that support validation.
 */
interface ValidatableInterface
{
    /**
     * Validate the object
     *
     * @return array<string, string[]> Validation errors keyed by field name
     */
    public function validate(): array;

    /**
     * Check if the object is valid
     */
    public function isValid(): bool;

    /**
     * Ensure the object is valid or throw an exception
     *
     * @throws \InvalidArgumentException When validation fails
     */
    public function ensureValid(): void;
}
