<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Trait;

/**
 * String-Backed Enum Trait
 *
 * Provides default implementations for StringBackedEnum interface methods.
 * Automatically handles case-insensitive conversion and validation.
 *
 * Requirements:
 * - Enum must be backed by string
 * - Enum must implement StringBackedEnum interface
 * - Enum must implement label() method (cannot be provided by trait)
 */
trait StringBackedEnumTrait
{
    /**
     * Create enum instance from string value (case-insensitive)
     *
     * Compares the trimmed, uppercase input against all enum values.
     * Returns null if no match is found.
     *
     * @param string|null $value The string value to convert
     * @return static|null The corresponding enum case or null if invalid
     */
    public static function fromString(?string $value): ?static
    {
        if ($value === null) {
            return null;
        }

        $normalized = strtoupper(trim($value));

        foreach (static::cases() as $case) {
            if (strtoupper($case->value) === $normalized) {
                return $case;
            }
        }

        return null;
    }

    /**
     * Check if a string value is valid for this enum
     *
     * @param string|null $value The value to validate
     * @return bool True if valid, false otherwise
     */
    public static function isValid(?string $value): bool
    {
        return self::fromString($value) !== null;
    }

    /**
     * Get all valid string values for this enum
     *
     * @return array<int, string> Array of all enum values
     */
    public static function values(): array
    {
        return array_map(
            static fn (self $case): string => $case->value,
            static::cases()
        );
    }

    /**
     * Get all labels mapped by their enum values
     *
     * @return array<string, string> Map of value => label
     */
    public static function labels(): array
    {
        $labels = [];
        
        foreach (static::cases() as $case) {
            $labels[$case->value] = $case->label();
        }
        
        return $labels;
    }
}
