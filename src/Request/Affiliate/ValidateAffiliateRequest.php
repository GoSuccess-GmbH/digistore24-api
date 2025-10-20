<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Validate Affiliate Request
 *
 * Validates affiliate credentials and checks if the affiliate is active.
 */
final class ValidateAffiliateRequest extends AbstractRequest
{
    /**
     * @param string $affiliateId The affiliate ID to validate
     */
    public function __construct(
        private string $affiliateId,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/validateAffiliate';
    }

    public function method(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return ['affiliate_id' => $this->affiliateId];
    }
}
