<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Contract;

/**
 * Int-Backed Enum Contract
 *
 * Defines standard methods that all int-backed enums should implement.
 * Provides a consistent API for enum conversion, validation, and labeling.
 *
 * Note: cases() is not included as it's a native PHP enum method.
 */
interface IntBackedEnum
{
    /**
     * Get human-readable label for the enum case
     *
     * @return string The display label
     */
    public function label(): string;

    /**
     * Create enum instance from integer value
     *
     * @param int|null $value The integer value to convert
     * @return static|null The corresponding enum case or null if invalid
     */
    public static function fromInt(?int $value): ?static;

    /**
     * Check if an integer value is valid for this enum
     *
     * @param int|null $value The value to validate
     * @return bool True if valid, false otherwise
     */
    public static function isValid(?int $value): bool;
}
