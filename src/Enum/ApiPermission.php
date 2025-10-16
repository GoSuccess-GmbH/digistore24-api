<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * API Permission Level
 *
 * Permission levels for API keys.
 */
enum ApiPermission: string
{
    case ReadOnly = 'read-only';
    case Writable = 'writable';
}
