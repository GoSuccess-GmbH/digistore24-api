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
    /**
     * @param string|null $domainId Domain ID specified when creating the connection using ipnSetup
     */
    public function __construct(
        private ?string $domainId = null,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/ipnInfo';
    }

    public function getMethod(): HttpMethod
    {
        return HttpMethod::GET;
    }

    public function toArray(): array
    {
        $params = [];

        if ($this->domainId !== null) {
            $params['domain_id'] = $this->domainId;
        }

        return $params;
    }
}
