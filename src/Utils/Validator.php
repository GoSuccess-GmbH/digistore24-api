<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Utils;

/**
 * Validator Utility
 * 
 * Provides static methods for validating values.
 * Uses PHP 8.4 features for clean validation logic.
 */
final class Validator
{
    /**
     * Private constructor to prevent instantiation
     */
    private function __construct()
    {
    }

    /**
     * Validate email address
     */
    public static function isEmail(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate URL
     */
    public static function isUrl(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Validate if value is numeric
     */
    public static function isNumeric(mixed $value): bool
    {
        return is_numeric($value);
    }

    /**
     * Validate if value is integer
     */
    public static function isInteger(mixed $value): bool
    {
        return is_int($value) || (is_string($value) && ctype_digit($value));
    }

    /**
     * Validate if value is in range
     * 
     * @param int|float $value
     * @param int|float $min
     * @param int|float $max
     */
    public static function inRange(int|float $value, int|float $min, int|float $max): bool
    {
        return $value >= $min && $value <= $max;
    }

    /**
     * Validate if string matches pattern
     */
    public static function matches(string $value, string $pattern): bool
    {
        return preg_match($pattern, $value) === 1;
    }

    /**
     * Validate string length
     */
    public static function length(string $value, int $min = 0, ?int $max = null): bool
    {
        $length = mb_strlen($value);
        
        if ($length < $min) {
            return false;
        }

        if ($max !== null && $length > $max) {
            return false;
        }

        return true;
    }

    /**
     * Validate if value is in array
     * 
     * @param array<mixed> $haystack
     */
    public static function in(mixed $value, array $haystack, bool $strict = true): bool
    {
        return in_array($value, $haystack, $strict);
    }

    /**
     * Validate if value is not in array
     * 
     * @param array<mixed> $haystack
     */
    public static function notIn(mixed $value, array $haystack, bool $strict = true): bool
    {
        return !self::in($value, $haystack, $strict);
    }

    /**
     * Validate required field (not null, not empty string)
     */
    public static function required(mixed $value): bool
    {
        return $value !== null && $value !== '';
    }

    /**
     * Validate Digistore24 API key format (XXX-XXXXXXXXXXXXXXXXX)
     */
    public static function isApiKey(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return self::matches($value, '/^\d+-[A-Za-z0-9]{20,}$/');
    }

    /**
     * Validate country code (2-letter ISO)
     */
    public static function isCountryCode(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return self::matches($value, '/^[A-Z]{2}$/');
    }

    /**
     * Validate currency code (3-letter ISO)
     */
    public static function isCurrencyCode(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return self::matches($value, '/^[A-Z]{3}$/');
    }

    /**
     * Validate language code (2-letter ISO)
     */
    public static function isLanguageCode(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return self::matches($value, '/^[a-z]{2}$/');
    }

    /**
     * Validate if array has required keys
     * 
     * @param array<string, mixed> $array
     * @param string[] $requiredKeys
     */
    public static function hasRequiredKeys(array $array, array $requiredKeys): bool
    {
        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $array)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validate array and return errors
     * 
     * @param array<string, mixed> $data Data to validate
     * @param array<string, array{rule: string, params?: array<mixed>, message?: string}> $rules Validation rules
     * @return array<string, string[]> Validation errors
     */
    public static function validate(array $data, array $rules): array
    {
        $errors = [];

        foreach ($rules as $field => $rule) {
            $value = $data[$field] ?? null;
            $ruleName = $rule['rule'];
            $params = $rule['params'] ?? [];
            $message = $rule['message'] ?? "Validation failed for {$field}";

            $valid = match ($ruleName) {
                'required' => self::required($value),
                'email' => self::isEmail($value),
                'url' => self::isUrl($value),
                'numeric' => self::isNumeric($value),
                'integer' => self::isInteger($value),
                'in' => self::in($value, $params[0] ?? []),
                'length' => self::length((string) $value, $params[0] ?? 0, $params[1] ?? null),
                'matches' => self::matches((string) $value, $params[0] ?? ''),
                default => true,
            };

            if (!$valid) {
                $errors[$field][] = $message;
            }
        }

        return $errors;
    }
}
