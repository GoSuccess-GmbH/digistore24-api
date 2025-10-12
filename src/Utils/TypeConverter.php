<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Utils;

use DateTime;
use DateTimeImmutable;

/**
 * Type Converter Utility
 * 
 * Provides static methods for converting values between types.
 * Replaces the old Helpers trait with proper utility class.
 * 
 * Uses PHP 8.4 features for clean, type-safe conversions.
 */
final class TypeConverter
{
    /**
     * Private constructor to prevent instantiation
     */
    private function __construct()
    {
    }

    /**
     * Convert value to integer
     * 
     * @param mixed $value Value to convert
     * @return int|null Integer value or null if conversion fails
     */
    public static function toInt(mixed $value): ?int
    {
        return match (true) {
            $value === null || $value === '' => null,
            is_int($value) => $value,
            is_numeric($value) => (int) $value,
            default => null,
        };
    }

    /**
     * Convert value to float
     * 
     * @param mixed $value Value to convert
     * @return float|null Float value or null if conversion fails
     */
    public static function toFloat(mixed $value): ?float
    {
        return match (true) {
            $value === null || $value === '' => null,
            is_float($value) => $value,
            is_numeric($value) => (float) $value,
            default => null,
        };
    }

    /**
     * Convert value to boolean
     * 
     * Handles Digistore24's boolean representations:
     * - Truthy: '1', 'Y', 'yes', 'T', 'true', true
     * - Falsy: '0', 'N', 'no', 'F', 'false', false
     * 
     * @link https://dev.digistore24.com/en/articles/4
     * @param mixed $value Value to convert
     * @return bool|null Boolean value or null if not recognized
     */
    public static function toBool(mixed $value): ?bool
    {
        if ($value === null) {
            return null;
        }

        if (is_bool($value)) {
            return $value;
        }

        $normalized = is_string($value) ? trim($value) : (string) $value;

        return match ($normalized) {
            '1', 'Y', 'yes', 'T', 'true' => true,
            '0', 'N', 'no', 'F', 'false' => false,
            default => null,
        };
    }

    /**
     * Convert value to DateTime
     * 
     * @param mixed $value Value to convert (string, int timestamp, DateTime)
     * @return DateTime|null DateTime object or null if conversion fails
     */
    public static function toDateTime(mixed $value): ?DateTime
    {
        return match (true) {
            $value === null || $value === '' => null,
            $value instanceof DateTime => clone $value,
            $value instanceof DateTimeImmutable => DateTime::createFromImmutable($value),
            is_string($value) => self::parseDateTime($value),
            is_int($value) => (new DateTime())->setTimestamp($value),
            default => null,
        };
    }

    /**
     * Convert value to DateTimeImmutable
     * 
     * @param mixed $value Value to convert
     * @return DateTimeImmutable|null DateTimeImmutable object or null
     */
    public static function toDateTimeImmutable(mixed $value): ?DateTimeImmutable
    {
        return match (true) {
            $value === null || $value === '' => null,
            $value instanceof DateTimeImmutable => $value,
            $value instanceof DateTime => DateTimeImmutable::createFromMutable($value),
            is_string($value) => self::parseDateTimeImmutable($value),
            is_int($value) => (new DateTimeImmutable())->setTimestamp($value),
            default => null,
        };
    }

    /**
     * Convert value to string
     * 
     * @param mixed $value Value to convert
     * @return string|null String value or null if null input
     */
    public static function toString(mixed $value): ?string
    {
        return match (true) {
            $value === null => null,
            is_string($value) => $value,
            is_scalar($value) => (string) $value,
            $value instanceof \Stringable => (string) $value,
            default => null,
        };
    }

    /**
     * Convert value to array
     * 
     * @param mixed $value Value to convert
     * @return array<mixed>|null Array or null
     */
    public static function toArray(mixed $value): ?array
    {
        return match (true) {
            $value === null => null,
            is_array($value) => $value,
            $value instanceof \Traversable => iterator_to_array($value),
            is_object($value) => (array) $value,
            default => [$value],
        };
    }

    /**
     * Parse string to DateTime
     */
    private static function parseDateTime(string $value): ?DateTime
    {
        try {
            return new DateTime($value);
        } catch (\Exception) {
            return null;
        }
    }

    /**
     * Parse string to DateTimeImmutable
     */
    private static function parseDateTimeImmutable(string $value): ?DateTimeImmutable
    {
        try {
            return new DateTimeImmutable($value);
        } catch (\Exception) {
            return null;
        }
    }

    /**
     * Convert value to enum case
     * 
     * @template T of \BackedEnum
     * @param class-string<T> $enumClass
     * @param mixed $value
     * @return T|null
     */
    public static function toEnum(string $enumClass, mixed $value): ?\BackedEnum
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof $enumClass) {
            return $value;
        }

        try {
            return $enumClass::from($value);
        } catch (\ValueError) {
            return null;
        }
    }
}
