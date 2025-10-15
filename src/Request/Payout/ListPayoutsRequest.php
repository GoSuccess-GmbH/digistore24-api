<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Payout;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Payouts Request
 *
 * Retrieves a list of all payouts.
 */
final class ListPayoutsRequest extends AbstractRequest
{
    public function __construct()
    {
    }

    public function getEndpoint(): string
    {
        return '/listPayouts';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        return [];
    }
}
