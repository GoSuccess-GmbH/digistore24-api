<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Contract;

/**
 * String-Backed Enum Contract
 *
 * Defines standard methods that all string-backed enums should implement.
 * Provides a consistent API for enum conversion, validation, and labeling.
 *
 * Note: cases() is not included as it's a native PHP enum method.
 */
interface StringBackedEnum
{
    /**
     * Get human-readable label for the enum case
     *
     * @return string The display label
     */
    public function label(): string;

    /**
     * Create enum instance from string value (case-insensitive)
     *
     * @param string|null $value The string value to convert
     * @return static|null The corresponding enum case or null if invalid
     */
    public static function fromString(?string $value): ?static;

    /**
     * Check if a string value is valid for this enum
     *
     * @param string|null $value The value to validate
     * @return bool True if valid, false otherwise
     */
    public static function isValid(?string $value): bool;
}
