<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Abstracts;

use stdClass;
use ReflectionClass;

abstract class Model
{
    use \GoSuccess\Digistore24\Traits\Helpers;

    /**
     * Cache for reflection data per class
     * @var array<string, array<string, array{type: string, attributes: array}>>
     */
    private static array $reflectionCache = [];

    public function __construct(?stdClass $data = null)
    {
        if ($data === null) {
            return;
        }

        $className = static::class;
        
        // Get or cache reflection data
        if (!isset(self::$reflectionCache[$className])) {
            self::$reflectionCache[$className] = $this->buildReflectionCache($className);
        }

        $properties = self::$reflectionCache[$className];

        foreach ($properties as $property => $metadata) {
            if (!property_exists($data, $property)) {
                continue;
            }

            $propertyType = $metadata['type'];
            $propertyAttributes = $metadata['attributes'];
            $propertyValue = $this->convertValue(
                $data->$property,
                $propertyType,
                $propertyAttributes
            );

            $this->$property = $propertyValue;
        }
    }

    /**
     * Build reflection cache for a class
     *
     * @param string $className
     * @return array<string, array{type: string, attributes: array}>
     */
    private function buildReflectionCache(string $className): array
    {
        $reflection = new ReflectionClass($className);
        $cache = [];

        foreach ($reflection->getProperties() as $property) {
            $type = $property->getType();
            if ($type === null) {
                continue;
            }

            $typeName = $type->getName();
            $attributes = $this->extractAttributes($property);

            $cache[$property->getName()] = [
                'type' => $typeName,
                'attributes' => $attributes,
            ];
        }

        return $cache;
    }

    /**
     * Extract attributes from a reflection property
     *
     * @param \ReflectionProperty $property
     * @return array<string, array>
     */
    private function extractAttributes(\ReflectionProperty $property): array
    {
        $attributes = [];
        
        foreach ($property->getAttributes() as $attribute) {
            $attributes[$attribute->getName()] = $attribute->getArguments();
        }

        return $attributes;
    }

    /**
     * Convert value based on type and attributes
     *
     * @param mixed $value
     * @param string $type
     * @param array $attributes
     * @return mixed
     */
    private function convertValue(mixed $value, string $type, array $attributes): mixed
    {
        return match ($type) {
            'int' => $this->stringToInt($value),
            'float' => $this->stringToFloat($value),
            'bool' => $this->stringToBool($value),
            'DateTime' => $this->stringToDatetime($value),
            'string' => $value,
            'array' => $this->convertArrayValue($value, $attributes),
            default => $this->convertComplexType($value, $type),
        };
    }

    /**
     * Convert array values with proper typing
     *
     * @param mixed $value
     * @param array $attributes
     * @return array
     */
    private function convertArrayValue(mixed $value, array $attributes): array
    {
        if (empty($value)) {
            return [];
        }

        $arrayItemType = $attributes['GoSuccess\Digistore24\Attributes\ArrayItemType'] ?? null;

        if ($arrayItemType === null) {
            return is_array($value) ? $value : explode(',', (string) $value);
        }

        $itemType = $arrayItemType['type'] ?? null;
        $itemObject = $arrayItemType['object'] ?? null;

        if (is_string($value) && $itemType === 'enum') {
            $value = explode(',', $value);
        }

        if (!is_array($value)) {
            return [];
        }

        return match ($itemType) {
            'int' => array_map(
                fn(mixed $item): ?int => $this->stringToInt($item),
                $value
            ),
            'float' => array_map(
                fn(mixed $item): ?float => $this->stringToFloat($item),
                $value
            ),
            'class' => class_exists($itemObject ?? '')
                ? array_map(
                    fn(stdClass $item): object => new $itemObject($item),
                    $value
                )
                : [],
            'enum' => enum_exists($itemObject ?? '')
                ? array_map(
                    fn(mixed $item): ?\UnitEnum => $itemObject::tryFrom($item),
                    $value
                )
                : [],
            default => $value,
        };
    }

    /**
     * Convert complex types (enums, classes)
     *
     * @param mixed $value
     * @param string $type
     * @return mixed
     */
    private function convertComplexType(mixed $value, string $type): mixed
    {
        if (enum_exists($type)) {
            return $type::tryFrom($value);
        }

        if (class_exists($type)) {
            return new $type($value);
        }

        return $value;
    }
}
