<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Utils;

/**
 * Array Helper Utility
 * 
 * Provides static methods for common array operations.
 * Uses PHP 8.4 features for clean, type-safe array handling.
 */
final class ArrayHelper
{
    /**
     * Private constructor to prevent instantiation
     */
    private function __construct()
    {
    }

    /**
     * Get value from array using dot notation
     * 
     * @param array<string, mixed> $array
     * @param string $key Dot notation key (e.g., 'user.address.city')
     * @param mixed $default Default value if key not found
     * @return mixed
     */
    public static function get(array $array, string $key, mixed $default = null): mixed
    {
        if (isset($array[$key])) {
            return $array[$key];
        }

        if (!str_contains($key, '.')) {
            return $default;
        }

        $keys = explode('.', $key);
        $current = $array;

        foreach ($keys as $segment) {
            if (!is_array($current) || !array_key_exists($segment, $current)) {
                return $default;
            }
            $current = $current[$segment];
        }

        return $current;
    }

    /**
     * Set value in array using dot notation
     * 
     * @param array<string, mixed> $array
     * @param string $key Dot notation key
     * @param mixed $value Value to set
     */
    public static function set(array &$array, string $key, mixed $value): void
    {
        if (!str_contains($key, '.')) {
            $array[$key] = $value;
            return;
        }

        $keys = explode('.', $key);
        $current = &$array;

        foreach ($keys as $i => $segment) {
            if ($i === count($keys) - 1) {
                $current[$segment] = $value;
                return;
            }

            if (!isset($current[$segment]) || !is_array($current[$segment])) {
                $current[$segment] = [];
            }

            $current = &$current[$segment];
        }
    }

    /**
     * Check if array has key using dot notation
     * 
     * @param array<string, mixed> $array
     * @param string $key Dot notation key
     */
    public static function has(array $array, string $key): bool
    {
        if (isset($array[$key])) {
            return true;
        }

        if (!str_contains($key, '.')) {
            return false;
        }

        $keys = explode('.', $key);
        $current = $array;

        foreach ($keys as $segment) {
            if (!is_array($current) || !array_key_exists($segment, $current)) {
                return false;
            }
            $current = $current[$segment];
        }

        return true;
    }

    /**
     * Remove null values from array recursively
     * 
     * @param array<string, mixed> $array
     * @return array<string, mixed>
     */
    public static function removeNulls(array $array): array
    {
        return array_filter(
            array_map(
                fn($value) => is_array($value) ? self::removeNulls($value) : $value,
                $array
            ),
            fn($value) => $value !== null
        );
    }

    /**
     * Flatten multi-dimensional array
     * 
     * @param array<string, mixed> $array
     * @param string $prefix Key prefix for nested values
     * @return array<string, mixed>
     */
    public static function flatten(array $array, string $prefix = ''): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $newKey = $prefix === '' ? $key : "{$prefix}.{$key}";

            if (is_array($value)) {
                $result = [...$result, ...self::flatten($value, $newKey)];
            } else {
                $result[$newKey] = $value;
            }
        }

        return $result;
    }

    /**
     * Convert array keys to camelCase
     * 
     * @param array<string, mixed> $array
     * @param bool $recursive Apply recursively
     * @return array<string, mixed>
     */
    public static function keysToCamelCase(array $array, bool $recursive = false): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $camelKey = self::toCamelCase((string) $key);
            $result[$camelKey] = $recursive && is_array($value)
                ? self::keysToCamelCase($value, true)
                : $value;
        }

        return $result;
    }

    /**
     * Convert array keys to snake_case
     * 
     * @param array<string, mixed> $array
     * @param bool $recursive Apply recursively
     * @return array<string, mixed>
     */
    public static function keysToSnakeCase(array $array, bool $recursive = false): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $snakeKey = self::toSnakeCase((string) $key);
            $result[$snakeKey] = $recursive && is_array($value)
                ? self::keysToSnakeCase($value, true)
                : $value;
        }

        return $result;
    }

    /**
     * Only keep specified keys from array
     * 
     * @param array<string, mixed> $array
     * @param string[] $keys Keys to keep
     * @return array<string, mixed>
     */
    public static function only(array $array, array $keys): array
    {
        return array_intersect_key($array, array_flip($keys));
    }

    /**
     * Remove specified keys from array
     * 
     * @param array<string, mixed> $array
     * @param string[] $keys Keys to remove
     * @return array<string, mixed>
     */
    public static function except(array $array, array $keys): array
    {
        return array_diff_key($array, array_flip($keys));
    }

    /**
     * Convert string to camelCase
     */
    private static function toCamelCase(string $value): string
    {
        $value = str_replace(['-', '_'], ' ', $value);
        $value = ucwords($value);
        $value = str_replace(' ', '', $value);
        return lcfirst($value);
    }

    /**
     * Convert string to snake_case
     */
    private static function toSnakeCase(string $value): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $value) ?? $value);
    }
}
