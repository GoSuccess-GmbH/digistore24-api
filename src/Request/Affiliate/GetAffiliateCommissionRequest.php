<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Get Affiliate Commission Request
 *
 * Retrieves commission settings for a specific affiliate and product(s).
 */
final class GetAffiliateCommissionRequest extends AbstractRequest
{
    /**
     * @param string $affiliateId The affiliate ID
     * @param string $productIds Product IDs (comma-separated) or "all" for all products
     */
    public function __construct(
        private string $affiliateId,
        private string $productIds = 'all',
    ) {
    }

    public function getEndpoint(): string
    {
        return '/getAffiliateCommission';
    }

    public function method(): HttpMethod
    {
        return HttpMethod::GET;
    }

    public function toArray(): array
    {
        return [
            'affiliate_id' => $this->affiliateId,
            'product_ids' => $this->productIds,
        ];
    }
}
