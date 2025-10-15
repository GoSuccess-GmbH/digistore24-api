<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\AffiliateCommissionData;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Update Affiliate Commission Request
 *
 * Updates commission settings for a specific affiliate and product.
 */
final class UpdateAffiliateCommissionRequest extends AbstractRequest
{
    /**
     * @param int $productId The product ID
     * @param string $affiliateId The affiliate ID
     * @param AffiliateCommissionData $commission Commission settings data
     */
    public function __construct(
        private int $productId,
        private string $affiliateId,
        private AffiliateCommissionData $commission,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/updateAffiliateCommission';
    }

    public function method(): Method
    {
        return Method::POST;
    }

    public function toArray(): array
    {
        return array_merge(
            [
                'product_id' => $this->productId,
                'affiliate_id' => $this->affiliateId,
            ],
            $this->commission->toArray(),
        );
    }
}
