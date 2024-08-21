<?php

namespace GoSuccess\Digistore24\Traits;

use DateTime;
use ReflectionClass;
use ReflectionProperty;
use stdClass;

trait Helpers
{
    /**
     * Convert String to DateTime.
     * @param mixed $datetime
     * @return \DateTime|null
     */
    public function string_to_datetime( ?string $datetime ): ?DateTime
    {
        return ( $datetime === null || empty( trim( $datetime ) ) ) ? null : new DateTime( $datetime );
    }

    /**
     * Possible boolean values.
     * @link https://dev.digistore24.com/en/articles/4
     * @param mixed $string
     * @return bool|null
     */
    public function string_to_bool( ?string $string ): ?bool
    {
        return $string === null ? null : match ( trim( $string ) )
        {
            '1', 'Y', 'yes', 'T', 'true' => true,
            '0', 'N', 'no', 'F', 'false' => false,
            default => null,
        };
    }

    /**
     * Convert String to Integer.
     * @param mixed $string
     * @return int|null
     */
    public function string_to_int( ?string $string ): ?int
    {
        return is_numeric( $string ) ? (int) $string : null;
    }

    /**
     * Convert String to Float.
     * @param mixed $string
     * @return float|null
     */
    public function string_to_float( ?string $string ): ?float
    {
        return is_numeric( $string ) ? (float) $string : null;
    }

    /**
     * Get the property type of a class by the property name.
     * @param object|string $class
     * @param string $name
     * @return string
     */
    public function get_property_type( object|string $class, string $name ): string
    {
        $rp = new ReflectionProperty( $class, $name );
        $property_type =  $rp->getType()->getName();
        // $property_type = explode( '\\', $property_type );
        // $property_type = end( $property_type );

        return $property_type;
    }

    /**
     * Get all property attributes for a specific property.
     * @param object|string $class
     * @param string $property_name
     * @return array
     */
    public function get_property_attributes( object|string $class, string $property_name ): array
    {
        $rc = new ReflectionProperty( $class, $property_name );
        $attributes = $rc->getAttributes();
        // $attributes = array_map(
        //     function ( $attribute )
        //     {
        //         $attr = [];
        //         $attr[$attribute->getName()] = $attribute->getArguments();
        //         return $attr;
        //     },
        //     $attributes
        // );

        $attr = [];
        foreach ( $attributes as $attribute )
        {
            $attr[$attribute->getName()] = $attribute->getArguments();
        }

        return $attr;
    }

    public function property_array_map( array $property_array, object $item_type ): array
    {
        return array_map(
            function( stdClass $item ) use ( $item_type )
            {
                return new $item_type( $item );
            },
            $property_array
        );
    }
}
