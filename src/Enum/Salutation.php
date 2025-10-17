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
    case MRS = 'F';

    /**
     * Male salutation (Mr)
     */
    case MR = 'M';

    /**
     * No salutation
     */
    case NONE = '';

    /**
     * Get human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::MRS => 'Mrs',
            self::MR => 'Mr',
            self::NONE => 'None',
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
            'F' => self::MRS,
            'M' => self::MR,
            '' => self::NONE,
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
