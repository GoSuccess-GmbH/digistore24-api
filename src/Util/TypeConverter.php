<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Util;

use DateTimeImmutable;
use DateTimeInterface;

/**
 * Type Converter Utility
 * 
 * Provides type conversion utilities specific to the Digistore24 API.
 * Handles Digistore24-specific formats (e.g., Y/N for booleans).
 */
final class TypeConverter
{
    /**
     * Convert value to integer
     * 
     * @param mixed $value Value to convert
     * @param int|null $default Default value if conversion fails
     * @return int|null
     */
    public static function toInt(mixed $value, ?int $default = null): ?int
    {
        if ($value === null) {
            return $default;
        }

        if (is_int($value)) {
            return $value;
        }

        if (is_numeric($value)) {
            return (int) $value;
        }

        return $default;
    }

    /**
     * Convert value to float
     * 
     * @param mixed $value Value to convert
     * @param float|null $default Default value if conversion fails
     * @return float|null
     */
    public static function toFloat(mixed $value, ?float $default = null): ?float
    {
        if ($value === null) {
            return $default;
        }

        if (is_float($value)) {
            return $value;
        }

        if (is_numeric($value)) {
            return (float) $value;
        }

        return $default;
    }

    /**
     * Convert value to boolean
     * 
     * Handles Digistore24 format: 'Y' = true, 'N' = false
     * 
     * @param mixed $value Value to convert
     * @param bool|null $default Default value if conversion fails
     * @return bool|null
     */
    public static function toBool(mixed $value, ?bool $default = null): ?bool
    {
        if ($value === null) {
            return $default;
        }

        if (is_bool($value)) {
            return $value;
        }

        // Digistore24 format
        if ($value === 'Y' || $value === 'y') {
            return true;
        }

        if ($value === 'N' || $value === 'n') {
            return false;
        }

        // Standard conversions
        if (is_int($value)) {
            return $value !== 0;
        }

        if (is_string($value)) {
            $lower = strtolower($value);
            if (in_array($lower, ['true', '1', 'yes'], true)) {
                return true;
            }
            if (in_array($lower, ['false', '0', 'no', ''], true)) {
                return false;
            }
        }

        return $default;
    }

    /**
     * Convert value to DateTime
     * 
     * @param mixed $value Value to convert (timestamp, string, or DateTime object)
     * @param DateTimeImmutable|null $default Default value if conversion fails
     * @return DateTimeImmutable|null
     */
    public static function toDateTime(mixed $value, ?DateTimeImmutable $default = null): ?DateTimeImmutable
    {
        if ($value === null) {
            return $default;
        }

        if ($value instanceof DateTimeImmutable) {
            return $value;
        }

        if ($value instanceof DateTimeInterface) {
            return DateTimeImmutable::createFromInterface($value);
        }

        if (is_int($value)) {
            return (new DateTimeImmutable())->setTimestamp($value);
        }

        if (is_string($value)) {
            try {
                return new DateTimeImmutable($value);
            } catch (\Exception) {
                return $default;
            }
        }

        return $default;
    }

    /**
     * Convert value to array
     * 
     * @param mixed $value Value to convert
     * @param array|null $default Default value if conversion fails
     * @return array|null
     */
    public static function toArray(mixed $value, ?array $default = null): ?array
    {
        if ($value === null) {
            return $default;
        }

        if (is_array($value)) {
            return $value;
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $decoded;
            }
            // Return as single-element array for non-JSON strings
            return [$value];
        }

        if (is_object($value)) {
            return (array) $value;
        }

        return $default;
    }

    /**
     * Convert value to string
     * 
     * @param mixed $value Value to convert
     * @param string|null $default Default value if conversion fails
     * @return string|null
     */
    public static function toString(mixed $value, ?string $default = null): ?string
    {
        if ($value === null) {
            return $default;
        }

        if (is_string($value)) {
            return $value;
        }

        if (is_scalar($value)) {
            return (string) $value;
        }

        if (is_object($value) && method_exists($value, '__toString')) {
            return (string) $value;
        }

        return $default;
    }
}
