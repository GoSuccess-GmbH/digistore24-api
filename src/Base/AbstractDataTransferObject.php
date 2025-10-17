<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Base;

use DateTimeImmutable;
use GoSuccess\Digistore24\Api\Contract\DataTransferObjectInterface;
use GoSuccess\Digistore24\Api\Contract\IntBackedEnum;
use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Util\TypeConverter;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionProperty;

/**
 * Abstract Data Transfer Object
 *
 * Provides automatic serialization/deserialization for DTOs using Reflection.
 * Supports:
 * - Basic types (string, int, float, bool)
 * - Nullable types
 * - Arrays (including typed arrays via PHPDoc @var)
 * - DateTime objects
 * - Enums (StringBackedEnum, IntBackedEnum)
 * - Nested DTOs
 * - Property hooks (get/set)
 *
 * Usage:
 * - GET Response DTOs: Extend this class, use property hooks with `get =>`
 * - Request DTOs: Extend this class, use public properties or `set` hooks
 */
abstract class AbstractDataTransferObject implements DataTransferObjectInterface
{
    /**
     * Create instance from array
     *
     * @param array<string, mixed> $data
     * @return static
     */
    public static function fromArray(array $data): static
    {
        $reflection = new ReflectionClass(static::class);
        $constructor = $reflection->getConstructor();

        // If no constructor, create empty instance and set properties
        if ($constructor === null || $constructor->getNumberOfParameters() === 0) {
            $instance = $reflection->newInstanceWithoutConstructor();
            // Cast to generic object reflection to satisfy type requirements
            $objectReflection = new ReflectionClass($instance);
            // @phpstan-ignore-next-line argument.type (ReflectionClass covariance issue)
            self::setPropertiesFromArray($instance, $data, $objectReflection);

            /** @var static */
            return $instance;
        }

        // Build constructor arguments from data
        $args = [];
        foreach ($constructor->getParameters() as $param) {
            $name = $param->getName();
            $snakeCaseName = self::camelToSnake($name);

            // Try both camelCase and snake_case
            $value = $data[$name] ?? $data[$snakeCaseName] ?? null;

            // Get the parameter type
            $type = $param->getType();

            if ($type instanceof ReflectionNamedType) {
                $args[$name] = self::convertValue($value, $type, $param->allowsNull());
            } else {
                $args[$name] = $value;
            }
        }

        /** @phpstan-ignore-next-line instantiate static class */
        return new static(...$args);
    }

    /**
     * Convert instance to array
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $reflection = new ReflectionClass($this);
        $data = [];

        foreach ($reflection->getProperties() as $property) {
            // Skip static properties
            if ($property->isStatic()) {
                continue;
            }

            $property->setAccessible(true);
            $name = $property->getName();
            $value = $property->getValue($this);

            // Skip null values for optional properties
            if ($value === null) {
                continue;
            }

            // Convert property name to snake_case for API
            $key = self::camelToSnake($name);

            // Convert value based on type
            if ($value instanceof DataTransferObjectInterface) {
                $data[$key] = $value->toArray();
            } elseif ($value instanceof DateTimeImmutable) {
                $data[$key] = $value->format('Y-m-d H:i:s');
            } elseif ($value instanceof \BackedEnum) {
                $data[$key] = $value->value;
            } elseif (is_array($value)) {
                $data[$key] = array_map(function ($item) {
                    if ($item instanceof DataTransferObjectInterface) {
                        return $item->toArray();
                    }
                    if ($item instanceof \BackedEnum) {
                        return $item->value;
                    }

                    return $item;
                }, $value);
            } elseif (is_bool($value)) {
                // Convert bool to Y/N for Digistore24 API
                $data[$key] = $value ? 'Y' : 'N';
            } else {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * Set properties from array for instances without constructor parameters
     *
     * @param object $instance
     * @param array<string, mixed> $data
     * @param ReflectionClass<object> $reflection
     */
    private static function setPropertiesFromArray(object $instance, array $data, ReflectionClass $reflection): void
    {
        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            if ($property->isStatic()) {
                continue;
            }

            $name = $property->getName();
            $snakeCaseName = self::camelToSnake($name);

            // Try both camelCase and snake_case
            if (! isset($data[$name]) && ! isset($data[$snakeCaseName])) {
                continue;
            }

            $value = $data[$name] ?? $data[$snakeCaseName];
            $type = $property->getType();

            if ($type instanceof ReflectionNamedType) {
                $convertedValue = self::convertValue($value, $type, $type->allowsNull());
                $property->setValue($instance, $convertedValue);
            } else {
                $property->setValue($instance, $value);
            }
        }
    }

    /**
     * Convert value to target type
     *
     * @param mixed $value
     * @param ReflectionNamedType $type
     * @param bool $allowsNull
     * @return mixed
     */
    private static function convertValue(mixed $value, ReflectionNamedType $type, bool $allowsNull): mixed
    {
        if ($value === null && $allowsNull) {
            return null;
        }

        $typeName = $type->getName();

        return match ($typeName) {
            'string' => TypeConverter::toString($value) ?? '',
            'int' => TypeConverter::toInt($value) ?? 0,
            'float' => TypeConverter::toFloat($value) ?? 0.0,
            'bool' => TypeConverter::toBool($value) ?? false,
            'array' => TypeConverter::toArray($value) ?? [],
            DateTimeImmutable::class, 'DateTimeImmutable' => TypeConverter::toDateTime($value),
            default => self::convertComplexType($value, $typeName, $allowsNull),
        };
    }

    /**
     * Convert complex types (Enums, DTOs)
     *
     * @param mixed $value
     * @param string $typeName
     * @param bool $allowsNull
     * @return mixed
     */
    private static function convertComplexType(mixed $value, string $typeName, bool $allowsNull): mixed
    {
        if ($value === null && $allowsNull) {
            return null;
        }

        // Check if it's an Enum
        if (enum_exists($typeName)) {
            if (is_subclass_of($typeName, StringBackedEnum::class)) {
                if (! is_scalar($value) && ! is_null($value)) {
                    return null;
                }
                $stringValue = is_string($value) ? $value : strval($value);
                // PHPStan: We know this is a StringBackedEnum class-string
                return $typeName::fromString($stringValue); // @phpstan-ignore-line
            }
            if (is_subclass_of($typeName, IntBackedEnum::class)) {
                if (! is_scalar($value) && ! is_null($value) && ! is_array($value) && ! is_resource($value)) {
                    return null;
                }
                $intValue = is_int($value) ? $value : intval($value);
                // PHPStan: We know this is an IntBackedEnum class-string
                return $typeName::fromInt($intValue); // @phpstan-ignore-line
            }
            // Fallback for standard backed enums
            if (method_exists($typeName, 'from') && (is_int($value) || is_string($value))) {
                /** @var class-string<\BackedEnum> $enumClass */
                $enumClass = $typeName;
                /** @var int|string $scalarValue */
                $scalarValue = $value;
                return $enumClass::from($scalarValue);
            }
        }

        // Check if it's a DTO
        if (is_subclass_of($typeName, DataTransferObjectInterface::class) && is_array($value)) {
            // Ensure array has string keys
            $arrayValue = [];
            foreach ($value as $k => $v) {
                if (is_string($k)) {
                    $arrayValue[$k] = $v;
                }
            }
            /** @var class-string<DataTransferObjectInterface> $dtoClass */
            $dtoClass = $typeName;
            return $dtoClass::fromArray($arrayValue);
        }

        return $value;
    }

    /**
     * Convert camelCase to snake_case
     */
    private static function camelToSnake(string $input): string
    {
        $result = preg_replace('/([a-z])([A-Z])/', '$1_$2', $input);

        return $result !== null ? strtolower($result) : $input;
    }


}
