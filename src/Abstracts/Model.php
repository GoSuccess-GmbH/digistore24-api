<?php

namespace GoSuccess\Digistore24\Abstracts;

use stdClass;

abstract class Model
{
    use \GoSuccess\Digistore24\Traits\Helpers;

    public function __construct( ?stdClass $data = null )
    {
        if ( $data === null )
        {
            return;
        }

        error_log( print_r( $data, true ) );

        /**
         * Properties of current child object.
         */
        $properties = get_class_vars( $this::class );

        if ( ! is_countable( $properties ) )
        {
            return;
        }

        /**
         * Set all property values.
         */
        foreach ( $properties as $property => $value )
        {
            // Check if property exists in given data.
            if ( ! array_key_exists( $property, (array) $data ) )
            {
                continue;
            }

            if ( property_exists( $this::class, $property ) )
            {
                $property_type = $this->get_property_type( $this::class, $property );
                $property_value = $value;

                switch ( $property_type )
                {
                    case 'int':
                        $property_value = $this->string_to_int( $data->$property );
                        break;

                    case 'float':
                        $property_value = $this->string_to_float( $data->$property );
                        break;

                    case 'bool':
                        $property_value = $this->string_to_bool( $data->$property );
                        break;

                    case 'DateTime':
                        $property_value = $this->string_to_datetime( $data->$property );
                        break;

                    case 'string':
                        $property_value = $data->$property;
                        break;

                    case 'array':

                        if ( empty( $data->$property ) )
                        {
                            break;
                        }

                        $property_attributes = $this->get_property_attributes( $this::class, $property) ;

                        if ( empty( $property_attributes ) )
                        {
                            $property_value = is_array( $data->$property ) ? $data->$property : explode( ',', $data->$property);
                            break;
                        }

                        $array_item_type = $property_attributes['GoSuccess\Digistore24\Attributes\ArrayItemType']['type'] ?? null;
                        $array_item_object = $property_attributes['GoSuccess\Digistore24\Attributes\ArrayItemType']['object'] ?? null;

                        if ( is_string( $data->$property ) && $array_item_type === 'enum' )
                        {
                            $data->$property = explode( ',', $data->$property );
                        }

                        /**
                         * Loop through each array element.
                         */
                        foreach ( $data->$property as $property_element )
                        {
                            switch ( $array_item_type )
                            {
                                case 'int':
                                    $property_value[] = $this->string_to_int( $property_element );
                                    break;

                                case 'float':
                                    $property_value = $this->string_to_float( $property_element );
                                    break;

                                case 'class':
                                    if ( ! class_exists( $array_item_object ) )
                                    {
                                        break;
                                    }
                                    
                                    $property_value = array_map(
                                        function ( stdClass $element ) use ( $array_item_object )
                                        {
                                            return new $array_item_object( $element );
                                        },
                                        $data->$property
                                    );
                                    break;

                                case 'enum':
                                    if ( ! enum_exists( $array_item_object ) )
                                    {
                                        break;
                                    }

                                    $property_value = array_map(
                                        function ( $element ) use ( $array_item_object )
                                        {
                                            return $array_item_object::tryFrom( $element );
                                        },
                                        $data->$property
                                    );
                                    break;

                                default:
                                    break;
                            }
                        }
                        break;

                    default:
                        if ( enum_exists( $property_type ) )
                        {
                            $property_value = $property_type::tryFrom( $data->$property );
                            break;
                        }

                        $property_value = new $property_type( $data->$property );
                        break;
                }

                $this->$property = $property_value;
            }
        }
    }
}
