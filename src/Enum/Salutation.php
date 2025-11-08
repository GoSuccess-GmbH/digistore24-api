<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * Salutation
 *
 * Salutation/title for buyer addresses.
 */
enum Salutation: string implements StringBackedEnum
{
    use StringBackedEnumTrait;
    /**
     * Female salutation (Mrs)
     */
    case MRS = 'F';

    /**
     * Male salutation (Mr)
     */
    case MR = 'M';

    /**
     * No salutation
     */
    case NONE = '';

    /**
     * Get human-readable label
     *
     * @return string The display label
     */
    public function label(): string
    {
        return match ($this) {
            self::MRS => 'Mrs',
            self::MR => 'Mr',
            self::NONE => 'None',
        };
    }
}
