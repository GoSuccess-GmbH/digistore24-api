<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

/**
 * HTTP Methods supported by the API
 */
enum HttpMethod: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case PATCH = 'PATCH';

    public function label(): string
    {
        return $this->value; // HTTP methods are already properly formatted
    }
}
