<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
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
     * @param array $data Commission settings data
     */
    public function __construct(
        private int $productId,
        private string $affiliateId,
        private array $data
    ) {
    }

    public function getEndpoint(): string
    {
        return 'updateAffiliateCommission';
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
                'affiliate_id' => $this->affiliateId
            ],
            $this->data
        );
    }
}
