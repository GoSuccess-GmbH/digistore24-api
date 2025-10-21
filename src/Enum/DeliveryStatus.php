<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Delivery Status
 *
 * Status of a delivery update operation.
 */
enum DeliveryStatus: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case REQUEST = 'request';
    case IN_PROGRESS = 'in_progress';
    case DELIVERY = 'delivery';
    case PARTIAL_DELIVERY = 'partial_delivery';
    case RETURN = 'return';
    case CANCEL = 'cancel';

    public function label(): string
    {
        return match ($this) {
            self::REQUEST => 'Request',
            self::IN_PROGRESS => 'In Progress',
            self::DELIVERY => 'Delivery',
            self::PARTIAL_DELIVERY => 'Partial Delivery',
            self::RETURN => 'Return',
            self::CANCEL => 'Cancel',
        };
    }
}
