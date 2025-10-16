<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Base;

use GoSuccess\Digistore24\Api\Contract\ResponseInterface;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Abstract Response Base Class
 *
 * Base class for all API response objects.
 * Uses PHP 8.4 features for automatic type conversion.
 */
abstract class AbstractResponse implements ResponseInterface
{
    /**
     * Raw HTTP response
     */
    public Response $rawResponse;

    /**
     * Create response from HTTP response
     *
     * @param Response $response Raw HTTP response
     * @return static
     */
    public static function fromResponse(Response $response): static
    {
        // Digistore24 API wraps data in a "data" field
        // Example: {"api_version": "1.2", "result": "success", "data": {...}}
        $data = $response->data['data'] ?? $response->data;

        $instance = static::fromArray($data, $response);
        $instance->rawResponse = $response;

        return $instance;
    }

    /**
     * Create response from array data
     *
     * @param array<string, mixed> $data Response data
     * @param Response|null $rawResponse Raw HTTP response
     * @return static
     */
    abstract public static function fromArray(array $data, ?Response $rawResponse = null): static;

    /**
     * Get a value from data with type conversion
     */
    protected static function getValue(array $data, string $key, string $type = 'string', $default = null): mixed
    {
        $value = $data[$key] ?? $default;

        if ($value === null || $value === '') {
            return $default;
        }

        return match ($type) {
            'int', 'integer' => TypeConverter::toInt($value),
            'float', 'double' => TypeConverter::toFloat($value),
            'bool', 'boolean' => TypeConverter::toBool($value),
            'datetime', 'datetime_immutable' => TypeConverter::toDateTime($value),
            'array' => TypeConverter::toArray($value),
            'string' => TypeConverter::toString($value),
            default => $value,
        };
    }

    /**
     * Get array of values with type conversion
     *
     * @param array<string, mixed> $data
     * @param string $key
     * @param class-string $itemClass Item class for nested objects
     * @param Response|null $rawResponse Raw HTTP response to pass to nested objects
     * @return array<mixed>
     */
    protected static function getArray(array $data, string $key, ?string $itemClass = null, ?Response $rawResponse = null): array
    {
        $value = $data[$key] ?? [];

        if (! is_array($value)) {
            return [];
        }

        if ($itemClass === null) {
            return $value;
        }

        // Convert array items to objects
        return array_map(
            fn ($item) => is_subclass_of($itemClass, self::class)
                ? $itemClass::fromArray($item, $rawResponse)
                : $item,
            $value,
        );
    }

    /**
     * Convert to array
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];

        foreach (get_object_vars($this) as $property => $value) {
            if ($property === 'rawResponse') {
                continue;
            }

            if ($value instanceof self) {
                $data[$property] = $value->toArray();
            } elseif (is_array($value)) {
                $data[$property] = array_map(
                    fn ($item) => $item instanceof self ? $item->toArray() : $item,
                    $value,
                );
            } elseif ($value instanceof \DateTimeInterface) {
                $data[$property] = $value->format('Y-m-d H:i:s');
            } elseif ($value instanceof \BackedEnum) {
                $data[$property] = $value->value;
            } else {
                $data[$property] = $value;
            }
        }

        return $data;
    }
}
