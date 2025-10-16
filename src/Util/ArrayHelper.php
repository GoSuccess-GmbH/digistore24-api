<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Util;

/**
 * Array Helper Utility
 *
 * Provides array manipulation utilities.
 */
final class ArrayHelper
{
    /**
     * Get value from array using dot notation
     *
     * @param array<string, mixed> $array Source array
     * @param string $key Key in dot notation (e.g., 'user.address.city')
     * @param mixed $default Default value if key not found
     * @return mixed
     */
    public static function get(array $array, string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        $keys = explode('.', $key);
        foreach ($keys as $segment) {
            if (is_array($array) && array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }

        return $array;
    }

    /**
     * Set value in array using dot notation
     *
     * @param array<string, mixed> $array Target array
     * @param string $key Key in dot notation
     * @param mixed $value Value to set
     */
    public static function set(array &$array, string $key, mixed $value): void
    {
        $keys = explode('.', $key);
        $current = &$array;

        foreach ($keys as $segment) {
            if (! isset($current[$segment]) || ! is_array($current[$segment])) {
                $current[$segment] = [];
            }
            $current = &$current[$segment];
        }

        $current = $value;
    }

    /**
     * Check if key exists in array using dot notation
     *
     * @param array<string, mixed> $array Source array
     * @param string $key Key in dot notation
     * @return bool
     */
    public static function has(array $array, string $key): bool
    {
        if (array_key_exists($key, $array)) {
            return true;
        }

        $keys = explode('.', $key);
        foreach ($keys as $segment) {
            if (is_array($array) && array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * Remove key from array using dot notation
     *
     * @param array<string, mixed> $array Target array
     * @param string $key Key in dot notation
     */
    public static function forget(array &$array, string $key): void
    {
        if (array_key_exists($key, $array)) {
            unset($array[$key]);

            return;
        }

        $keys = explode('.', $key);
        $lastKey = array_pop($keys);
        $current = &$array;

        foreach ($keys as $segment) {
            if (! isset($current[$segment]) || ! is_array($current[$segment])) {
                return;
            }
            $current = &$current[$segment];
        }

        unset($current[$lastKey]);
    }

    /**
     * Flatten multidimensional array to single level using dot notation
     *
     * @param array<int|string, mixed> $array Array to flatten
     * @param string $prefix Key prefix
     * @return array<string, mixed>
     */
    public static function flatten(array $array, string $prefix = ''): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            // Convert key to string for dot notation
            $keyStr = is_int($key) ? (string)$key : $key;
            $newKey = $prefix === '' ? $keyStr : $prefix . '.' . $keyStr;

            if (is_array($value) && ! empty($value)) {
                /** @var array<string, mixed> $flattened */
                $flattened = self::flatten($value, $newKey);
                $result = array_merge($result, $flattened);
            } else {
                $result[$newKey] = $value;
            }
        }

        return $result;
    }

    /**
     * Filter array by keys
     *
     * @param array<string, mixed> $array Source array
     * @param array<int, string> $keys Keys to keep
     * @return array<string, mixed>
     */
    public static function only(array $array, array $keys): array
    {
        return array_intersect_key($array, array_flip($keys));
    }

    /**
     * Filter array excluding specified keys
     *
     * @param array<string, mixed> $array Source array
     * @param array<int, string> $keys Keys to exclude
     * @return array<string, mixed>
     */
    public static function except(array $array, array $keys): array
    {
        return array_diff_key($array, array_flip($keys));
    }

    /**
     * Get first element of array that passes truth test
     *
     * @param array<string, mixed> $array Source array
     * @param callable|null $callback Truth test function
     * @param mixed $default Default value if no match found
     * @return mixed
     */
    public static function first(array $array, ?callable $callback = null, mixed $default = null): mixed
    {
        if ($callback === null) {
            foreach ($array as $item) {
                return $item;
            }

            return $default;
        }

        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }

        return $default;
    }

    /**
     * Group array elements by key or callback result
     *
     * @param array<int|string, mixed> $array Source array
     * @param string|callable $groupBy Key name or callback function
     * @return array<string|int, array<int|string, mixed>>
     */
    public static function groupBy(array $array, string|callable $groupBy): array
    {
        $result = [];

        foreach ($array as $item) {
            if (is_string($groupBy)) {
                // Access array key - need to check if $item is array
                if (!is_array($item)) {
                    continue;
                }
                $key = $item[$groupBy] ?? null;
            } else {
                // Callable
                $key = $groupBy($item);
            }

            if ($key !== null && (is_string($key) || is_int($key))) {
                $result[$key][] = $item;
            }
        }

        return $result;
    }

    /**
     * Remove null values from array recursively
     *
     * @param array<int|string, mixed> $array Source array
     * @return array<int|string, mixed>
     */
    public static function filterNulls(array $array): array
    {
        return array_filter($array, function ($value) {
            if (is_array($value)) {
                return ! empty(self::filterNulls($value));
            }

            return $value !== null;
        });
    }

    /**
     * Map array keys using callback
     *
     * @param array<string, mixed> $array Source array
     * @param callable $callback Function to transform keys (string|int, mixed) => string|int
     * @return array<string|int, mixed>
     */
    public static function mapKeys(array $array, callable $callback): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $newKey = $callback($key, $value);
            
            // Ensure key is valid
            if (is_string($newKey) || is_int($newKey)) {
                $result[$newKey] = $value;
            }
        }

        return $result;
    }

    /**
     * Wrap value in array if not already an array
     *
     * @param mixed $value Value to wrap
     * @return array<int|string, mixed>
     */
    public static function wrap(mixed $value): array
    {
        if ($value === null) {
            return [];
        }

        return is_array($value) ? $value : [$value];
    }

    /**
     * Check if array is associative
     *
     * @param array<int|string, mixed> $array Array to check
     * @return bool
     */
    public static function isAssoc(array $array): bool
    {
        if ($array === []) {
            return false;
        }

        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * Convert array keys to camelCase
     *
     * @param array<string, mixed> $array Source array
     * @return array<int|string, mixed>
     */
    public static function keysToCamelCase(array $array): array
    {
        return self::mapKeys($array, fn ($key) => is_string($key) ? self::toCamelCase($key) : $key);
    }

    /**
     * Convert array keys to snake_case
     *
     * @param array<string, mixed> $array Source array
     * @return array<int|string, mixed>
     */
    public static function keysToSnakeCase(array $array): array
    {
        return self::mapKeys($array, fn ($key) => is_string($key) ? self::toSnakeCase($key) : $key);
    }

    /**
     * Convert string to camelCase
     *
     * @param string $value String to convert
     * @return string
     */
    public static function toCamelCase(string $value): string
    {
        // Remove underscores and capitalize first letter of each word except first
        $value = str_replace('_', '', ucwords($value, '_'));

        return lcfirst($value);
    }

    /**
     * Convert string to snake_case
     *
     * @param string $value String to convert
     * @return string
     */
    public static function toSnakeCase(string $value): string
    {
        // Insert underscore before uppercase letters and convert to lowercase
        $result = preg_replace('/([a-z])([A-Z])/', '$1_$2', $value);
        
        return $result !== null ? strtolower($result) : strtolower($value);
    }

    /**
     * Remove null values from array (alias for filterNulls)
     *
     * @param array<int|string, mixed> $array Source array
     * @return array<int|string, mixed>
     */
    public static function removeNulls(array $array): array
    {
        return self::filterNulls($array);
    }
}
