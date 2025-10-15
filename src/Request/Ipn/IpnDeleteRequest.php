<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Ipn;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * IPN Delete Request
 *
 * Deletes the IPN endpoint configuration.
 */
final class IpnDeleteRequest extends AbstractRequest
{
    public function __construct()
    {
    }

    public function getEndpoint(): string
    {
        return '/ipnDelete';
    }

    public function method(): Method
    {
        return Method::POST;
    }

    public function toArray(): array
    {
        return [];
    }
}
