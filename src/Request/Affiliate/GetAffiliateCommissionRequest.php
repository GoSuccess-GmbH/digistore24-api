<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Get Affiliate Commission Request
 *
 * Retrieves commission settings for a specific affiliate and product.
 */
final class GetAffiliateCommissionRequest extends AbstractRequest
{
    /**
     * @param int $productId The product ID
     * @param string $affiliateId The affiliate ID
     */
    public function __construct(
        private int $productId,
        private string $affiliateId,
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
            'product_id' => $this->productId,
            'affiliate_id' => $this->affiliateId,
        ];
    }
}
