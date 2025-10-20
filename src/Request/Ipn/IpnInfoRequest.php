<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Ipn;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * IPN Info Request
 *
 * Retrieves IPN configuration information for the authenticated account.
 */
final class IpnInfoRequest extends AbstractRequest
{
    public function __construct()
    {
    }

    public function getEndpoint(): string
    {
        return '/ipnInfo';
    }

    public function method(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return [];
    }
}
