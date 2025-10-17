<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * API Request Status
 *
 * Status of an API key request.
 */
enum ApiRequestStatus: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case PENDING = 'pending';
    case ABORTED = 'aborted';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::ABORTED => 'Aborted',
            self::COMPLETED => 'Completed',
        };
    }
}
