<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * Customer-to-affiliate program details for a buyer
 */
final readonly class CustomerAffiliateDetails
{
    public function __construct(
        public string $customerAffiliateName,
        public string $customerToAffiliateUrl,
        public string $customerAffiliatePromoUrl,
    ) {
    }
}

/**
 * Response from getting customer-to-affiliate buyer details
 *
 * @link https://digistore24.com/api/docs/paths/getCustomerToAffiliateBuyerDetails.yaml OpenAPI Specification
 */
final readonly class GetCustomerToAffiliateBuyerDetailsResponse extends AbstractResponse
{
    /** @var array<string, CustomerAffiliateDetails> Customer affiliate details indexed by purchase ID */
    public array $details;

    protected function parse(array $data): void
    {
        $details = [];

        // Handle single purchase response (data object directly)
        if (isset($data['data']) && isset($data['data']['customer_affiliate_name'])) {
            // Single purchase - extract purchase ID if available or use 'single'
            $purchaseId = array_key_first($data) !== 'data' ? array_key_first($data) : 'single';
            $details[$purchaseId] = $this->parseCustomerAffiliateDetails($data['data']);
        } else {
            // Handle multiple purchases (object with purchase IDs as keys)
            foreach ($data as $purchaseId => $purchaseData) {
                if (isset($purchaseData['data'])) {
                    $details[$purchaseId] = $this->parseCustomerAffiliateDetails($purchaseData['data']);
                }
            }
        }

        $this->details = $details;
    }

    private function parseCustomerAffiliateDetails(array $data): CustomerAffiliateDetails
    {
        return new CustomerAffiliateDetails(
            customerAffiliateName: $data['customer_affiliate_name'],
            customerToAffiliateUrl: $data['customer_to_affiliate_url'],
            customerAffiliatePromoUrl: $data['customer_affiliate_promo_url'],
        );
    }

    /**
     * Get customer affiliate details for a specific purchase
     */
    public function getDetailsForPurchase(string $purchaseId): ?CustomerAffiliateDetails
    {
        return $this->details[$purchaseId] ?? null;
    }
}
