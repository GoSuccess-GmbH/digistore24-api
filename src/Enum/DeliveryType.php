<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Delivery Type
 *
 * Type of product delivery method.
 */
enum DeliveryType: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case DIGITAL = 'digital';
    case SHIPPING = 'shipping';
    case SERVICE = 'service';
    case EVENT = 'event';
    case DOWNLOAD = 'download';

    public function label(): string
    {
        return match ($this) {
            self::DIGITAL => 'Digital',
            self::SHIPPING => 'Shipping',
            self::SERVICE => 'Service',
            self::EVENT => 'Event',
            self::DOWNLOAD => 'Download',
        };
    }
}
