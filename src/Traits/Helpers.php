<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Traits;

use DateTime;
use ReflectionProperty;

trait Helpers
{
    /**
     * Convert String to DateTime
     */
    public function stringToDatetime(?string $datetime): ?DateTime
    {
        return ($datetime === null || trim($datetime) === '') 
            ? null 
            : new DateTime($datetime);
    }

    /**
     * Possible boolean values
     * @link https://dev.digistore24.com/en/articles/4
     */
    public function stringToBool(?string $string): ?bool
    {
        if ($string === null) {
            return null;
        }

        return match (trim($string)) {
            '1', 'Y', 'yes', 'T', 'true' => true,
            '0', 'N', 'no', 'F', 'false' => false,
            default => null,
        };
    }

    /**
     * Convert String to Integer
     */
    public function stringToInt(mixed $string): ?int
    {
        return is_numeric($string) ? (int) $string : null;
    }

    /**
     * Convert String to Float
     */
    public function stringToFloat(mixed $string): ?float
    {
        return is_numeric($string) ? (float) $string : null;
    }

    /**
     * Get all property attributes for a specific property
     *
     * @param object|string $class
     * @param string $propertyName
     * @return array<string, array>
     */
    public function getPropertyAttributes(object|string $class, string $propertyName): array
    {
        $property = new ReflectionProperty($class, $propertyName);
        $attributes = [];

        foreach ($property->getAttributes() as $attribute) {
            $attributes[$attribute->getName()] = $attribute->getArguments();
        }

        return $attributes;
    }
}
