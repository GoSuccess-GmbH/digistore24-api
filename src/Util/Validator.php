<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Util;

use InvalidArgumentException;

/**
 * Validator Utility
 * 
 * Provides validation utilities for common data types and formats.
 */
final class Validator
{
    /**
     * Validate email format
     * 
     * @param string $email Email address to validate
     * @return bool
     */
    public static function isEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate URL format
     * 
     * @param string $url URL to validate
     * @return bool
     */
    public static function isUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Validate API key format (XXX-XXXXXXXXXXXXXXXXX)
     * 
     * @param string $apiKey API key to validate
     * @return bool
     */
    public static function isApiKey(string $apiKey): bool
    {
        return preg_match('/^[A-Z0-9]{3}-[A-Z0-9]{17}$/', $apiKey) === 1;
    }

    /**
     * Validate country code (2 letters)
     * 
     * @param string $code Country code to validate
     * @return bool
     */
    public static function isCountryCode(string $code): bool
    {
        return preg_match('/^[A-Z]{2}$/', $code) === 1;
    }

    /**
     * Validate currency code (3 letters)
     * 
     * @param string $code Currency code to validate
     * @return bool
     */
    public static function isCurrencyCode(string $code): bool
    {
        return preg_match('/^[A-Z]{3}$/', $code) === 1;
    }

    /**
     * Validate string length
     * 
     * @param string $value String to validate
     * @param int|null $min Minimum length
     * @param int|null $max Maximum length
     * @return bool
     */
    public static function isLength(string $value, ?int $min = null, ?int $max = null): bool
    {
        $length = mb_strlen($value);

        if ($min !== null && $length < $min) {
            return false;
        }

        if ($max !== null && $length > $max) {
            return false;
        }

        return true;
    }

    /**
     * Validate array with rules
     * 
     * @param array $data Data to validate
     * @param array $rules Validation rules
     * @return array Validation errors (empty if valid)
     * 
     * Supported rules:
     * - 'required': Field must be present and not empty
     * - 'email': Field must be valid email
     * - 'url': Field must be valid URL
     * - 'min:X': Field must have minimum length X
     * - 'max:X': Field must have maximum length X
     * - 'integer': Field must be integer
     * - 'numeric': Field must be numeric
     * - 'array': Field must be array
     */
    public static function validate(array $data, array $rules): array
    {
        $errors = [];

        foreach ($rules as $field => $fieldRules) {
            $fieldRules = is_string($fieldRules) ? explode('|', $fieldRules) : $fieldRules;
            $value = $data[$field] ?? null;

            foreach ($fieldRules as $rule) {
                $ruleParts = explode(':', $rule, 2);
                $ruleName = $ruleParts[0];
                $ruleParam = $ruleParts[1] ?? null;

                $error = self::validateRule($field, $value, $ruleName, $ruleParam);
                if ($error !== null) {
                    $errors[$field] = $error;
                    break; // Stop on first error for this field
                }
            }
        }

        return $errors;
    }

    /**
     * Validate single rule
     * 
     * @param string $field Field name
     * @param mixed $value Field value
     * @param string $rule Rule name
     * @param string|null $param Rule parameter
     * @return string|null Error message or null if valid
     */
    private static function validateRule(string $field, mixed $value, string $rule, ?string $param): ?string
    {
        switch ($rule) {
            case 'required':
                if ($value === null || $value === '' || $value === []) {
                    return "The {$field} field is required";
                }
                break;

            case 'email':
                if ($value !== null && !self::isEmail((string) $value)) {
                    return "The {$field} field must be a valid email address";
                }
                break;

            case 'url':
                if ($value !== null && !self::isUrl((string) $value)) {
                    return "The {$field} field must be a valid URL";
                }
                break;

            case 'min':
                if ($value !== null && $param !== null) {
                    $length = is_string($value) ? mb_strlen($value) : (is_numeric($value) ? $value : null);
                    if ($length !== null && $length < (int) $param) {
                        return "The {$field} field must be at least {$param}";
                    }
                }
                break;

            case 'max':
                if ($value !== null && $param !== null) {
                    $length = is_string($value) ? mb_strlen($value) : (is_numeric($value) ? $value : null);
                    if ($length !== null && $length > (int) $param) {
                        return "The {$field} field must not exceed {$param}";
                    }
                }
                break;

            case 'integer':
                if ($value !== null && !is_int($value) && !ctype_digit((string) $value)) {
                    return "The {$field} field must be an integer";
                }
                break;

            case 'numeric':
                if ($value !== null && !is_numeric($value)) {
                    return "The {$field} field must be numeric";
                }
                break;

            case 'array':
                if ($value !== null && !is_array($value)) {
                    return "The {$field} field must be an array";
                }
                break;
        }

        return null;
    }

    /**
     * Check if value is required and throw exception if not provided
     * 
     * @param mixed $value Value to check
     * @param string $field Field name for error message
     * @return void
     * @throws InvalidArgumentException
     */
    public static function required(mixed $value, string $field): void
    {
        if ($value === null || $value === '' || $value === []) {
            throw new InvalidArgumentException("The {$field} field is required");
        }
    }

    /**
     * Check if email is valid and throw exception if not
     * 
     * @param string $email Email to validate
     * @param string $field Field name for error message
     * @return void
     * @throws InvalidArgumentException
     */
    public static function requireEmail(string $email, string $field = 'email'): void
    {
        if (!self::isEmail($email)) {
            throw new InvalidArgumentException("The {$field} field must be a valid email address");
        }
    }

    /**
     * Check if URL is valid and throw exception if not
     * 
     * @param string $url URL to validate
     * @param string $field Field name for error message
     * @return void
     * @throws InvalidArgumentException
     */
    public static function requireUrl(string $url, string $field = 'url'): void
    {
        if (!self::isUrl($url)) {
            throw new InvalidArgumentException("The {$field} field must be a valid URL");
        }
    }
}
