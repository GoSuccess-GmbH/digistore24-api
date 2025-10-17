<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * Salutation
 *
 * Salutation/title for buyer addresses.
 */
enum Salutation: string
{
    /**
     * Female salutation (Mrs)
     */
    case Mrs = 'F';

    /**
     * Male salutation (Mr)
     */
    case Mr = 'M';

    /**
     * No salutation
     */
    case None = '';

    /**
     * Get human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::Mrs => 'Mrs',
            self::Mr => 'Mr',
            self::None => 'None',
        };
    }

    /**
     * Create from string value (case-insensitive)
     *
     * @param string|null $value The salutation value ('F', 'M', or empty)
     * @return self|null The corresponding enum case or null if invalid
     */
    public static function fromString(?string $value): ?self
    {
        if ($value === null) {
            return null;
        }

        $normalized = strtoupper(trim($value));

        return match ($normalized) {
            'F' => self::Mrs,
            'M' => self::Mr,
            '' => self::None,
            default => null,
        };
    }

    /**
     * Check if value is valid salutation
     *
     * @param string|null $value The value to check
     * @return bool True if valid, false otherwise
     */
    public static function isValid(?string $value): bool
    {
        if ($value === null) {
            return false;
        }

        $normalized = strtoupper(trim($value));

        return in_array($normalized, ['F', 'M', ''], true);
    }
}
