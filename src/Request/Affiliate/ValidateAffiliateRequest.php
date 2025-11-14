<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Validate Affiliate Request
 *
 * Checks if there is an affiliation for an affiliate and one or more products.
 * Returns the same information as when setting up an order form.
 */
final class ValidateAffiliateRequest extends AbstractRequest
{
    /**
     * @param string $affiliateName The Digistore24 ID of the affiliate
     * @param string $productIds One or more product IDs, separated by commas (e.g., "11,22,33,44")
     */
    public function __construct(
        private string $affiliateName,
        private string $productIds,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/validateAffiliate';
    }

    public function getMethod(): HttpMethod
    {
        return HttpMethod::GET;
    }

    public function toArray(): array
    {
        return [
            'affiliate_name' => $this->affiliateName,
            'product_ids' => $this->productIds,
        ];
    }
}
