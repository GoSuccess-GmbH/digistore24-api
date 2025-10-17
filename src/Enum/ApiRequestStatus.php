<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Enum;

/**
 * API Request Status
 *
 * Status of an API key request.
 */
enum ApiRequestStatus: string
{
    case PENDING = 'pending';
    case ABORTED = 'aborted';
    case COMPLETED = 'completed';
}
