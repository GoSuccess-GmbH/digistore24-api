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

        // if ( null !== $data )
        // {
        //     foreach( get_class_vars( $this::class ) as $property => $value )
        //     {
        //         if( property_exists( $data, $property ) )
        //         {
        //             $value = null;

        //             switch( $property )
        //             {
        //                 case 'approval_status_list':
        //                     $value = array_map(
        //                         function( stdClass $status )
        //                         {
        //                             return new ApprovalStatus( $status );
        //                         },
        //                         $data->$property
        //                     );
        //                     break;

        //                 case 'pay_methods':
        //                     $pay_methods = explode( ',', $data->$property );
        //                     $enums = [];

        //                     foreach ( $pay_methods as $pay_method )
        //                     {
        //                         $enum = PayMethod::tryFrom( $pay_method );

        //                         if ( $enum === null )
        //                         {
        //                             continue;
        //                         }

        //                         $enums[] = $enum;
        //                     }

        //                     $value = $enums;
        //                     break;

        //                 case 'granted_roles':
        //                     $granted_roles = explode( ',', $data->$property );
        //                     $enums = [];

        //                     foreach ( $granted_roles as $granted_role )
        //                     {
        //                         $enum = GrantedRole::tryFrom( ucfirst( $granted_role ) );

        //                         if ( $enum === null )
        //                         {
        //                             continue;
        //                         }

        //                         $enums[] = $enum;
        //                     }

        //                     $value = $enums;
        //                     break;

        //                 case 'granted_roles_msg':
        //                     $granted_roles_msgs = explode( ',', $data->$property );
        //                     $enums = [];

        //                     foreach ( $granted_roles_msgs as $granted_roles_msg )
        //                     {
        //                         $enum = GrantedRole::tryFrom( $granted_roles_msg )->value;

        //                         if ( $enum === null )
        //                         {
        //                             continue;
        //                         }

        //                         $enums[] = $enum;
        //                     }

        //                     $value = $enums;
        //                     break;

        //                 case 'reseller_ids':
        //                     $reseller_ids = explode( ',', $data->$property );
        //                     $enums = [];

        //                     foreach ( $reseller_ids as $reseller_id )
        //                     {
        //                         $enum = Reseller::tryFrom( (int) $reseller_id );

        //                         if ( $enum === null )
        //                         {
        //                             continue;
        //                         }

        //                         $enums[$reseller_id] = $enum;
        //                     }

        //                     $value = $enums;
        //                     break;

        //                 case 'categories':
        //                     $categories = explode( ',', $data->$property );
        //                     $enums = [];

        //                     foreach ( $categories as $category )
        //                     {
        //                         $enum = TransactionCategory::tryFrom( $category );

        //                         if ( $enum === null )
        //                         {
        //                             continue;
        //                         }

        //                         $enums[$category] = $enum;
        //                     }

        //                     $value = $enums;
        //                     break;

        //                 case 'transactions':
        //                     $transactions = explode( ',', $data->$property );
        //                     $enums = [];

        //                     foreach ( $transactions as $transaction )
        //                     {
        //                         $enum = TransactionType::tryFrom( $transaction );

        //                         if ( $enum === null )
        //                         {
        //                             continue;
        //                         }

        //                         $enums[$transaction] = $enum;
        //                     }

        //                     $value = $enums;
        //                     break;
                        
        //                 case 'paymentplans':
        //                     $value = array_map(
        //                         function( stdClass $paymentplan )
        //                         {
        //                             return new Paymentplan( $paymentplan );
        //                         },
        //                         $data->$property
        //                     );
        //                     break;

        //                 case 'affiliations':
        //                     $value = array_map(
        //                         function( stdClass $affiliation )
        //                         {
        //                             return new Affiliation( $affiliation );
        //                         },
        //                         $data->$property
        //                     );
        //                     break;

        //                 case 'transaction_list':
        //                     $value = array_map(
        //                         function( stdClass $transaction )
        //                         {
        //                             return new Transaction( $transaction );
        //                         },
        //                         $data->$property
        //                     );
        //                     break;

        //                 case 'addons':
        //                     $value = array_map(
        //                         function( stdClass $addon )
        //                         {
        //                             return new Product( $addon );
        //                         },
        //                         $data->$property
        //                     );
        //                     break;

        //                 case 'items':
        //                     switch( $this::class )
        //                     {
        //                         case 'Item':
        //                             $value = array_map(
        //                                 function( stdClass $item )
        //                                 {
        //                                     return new Item( $item );
        //                                 },
        //                                 $data->$property
        //                             );
        //                             break;
                                
        //                         default:
        //                             break;
        //                     }
        //                     break;

        //                 case 'product_ids':
        //                     $value = explode( ',', $data->$property );
        //                     break;

        //                 default:
        //                     $property_type = $this->get_property_type( $this::class, $property );

        //                     switch( $property_type )
        //                     {
        //                         case 'int':
        //                             $value = $this->string_to_int( $data->$property );
        //                             break;

        //                         case 'bool':
        //                             $value = $this->string_to_bool( $data->$property );
        //                             break;

        //                         case 'DateTime':
        //                             $value = $this->string_to_datetime( $data->$property );
        //                             break;

        //                         case 'RenderedTexts':
        //                             $value = new RenderedTexts( $data->$property );
        //                             break;

        //                         case 'RefundPolicy':
        //                             $value = new RefundPolicy( $data->$property );
        //                             break;

        //                         case 'CancelPolicy':
        //                             $value = new CancelPolicy( $data->$property );
        //                             break;

        //                         case 'RebillStopInfo':
        //                             $value = new RebillStopInfo( $data->$property );
        //                             break;

        //                         case 'Buyer':
        //                             $value = new Buyer( $data->$property );
        //                             break;

        //                         case 'LastPayment':
        //                             $value = new LastPayment( $data->$property );
        //                             break;

        //                         case 'Transaction':
        //                             $value = new Transaction( $data->$property );
        //                             break;

        //                         case 'TransactionRefundInfo':
        //                             $value = new TransactionRefundInfo( $data->$property );
        //                             break;

        //                         case 'Contact':
        //                             $value = new Contact( $data->$property );
        //                             break;

        //                         case 'IPNSettings':
        //                             $value = new Settings( $data->$property );
        //                             break;

        //                         case 'IPNSetupResponse':
        //                             $value = new SetupResponse( $data->$property );
        //                             break;

        //                         case 'AffiliateApprovalStatus':
        //                             $value = AffiliateApprovalStatus::tryFrom( $data->$property );
        //                             break;

        //                         case 'NewsletterSendPolicy':
        //                             $value = NewsletterSendPolicy::tryFrom( $data->$property );
        //                             break;
        
        //                         case 'IPNTiming':
        //                             $value = IPNTiming::tryFrom( $data->$property );
        //                             break;

        //                         case 'Tracking':
        //                             $value = new Tracking( $data->$property );
        //                             break;

        //                         case 'OrderFormSettings':
        //                             $value = new OrderFormSettings( $data->$property );
        //                             break;

        //                         default:
        //                             $value = $data->$property;
        //                             break;
        //                     }
        //                     break;
        //             }

        //             $this->$property = $value;
        //         }
        //     }
        // }
    }
}
