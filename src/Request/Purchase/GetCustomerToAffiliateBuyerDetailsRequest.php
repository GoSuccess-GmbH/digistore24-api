<?php

declare(strict_types=1);

namespace Digistore24\Request\Purchase;

use Digistore24\Base\AbstractRequest;

/**
 * Request to get customer-to-affiliate program details
 *
 * @link https://digistore24.com/api/docs/paths/getCustomerToAffiliateBuyerDetails.yaml OpenAPI Specification
 */
final readonly class GetCustomerToAffiliateBuyerDetailsRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId Single Digistore24 order ID or comma-separated list of order IDs
     */
    public function __construct(
        public string $purchaseId,
    ) {
    }

    public function toArray(): array
    {
        return [
            'purchase_id' => $this->purchaseId,
        ];
    }

    public function validate(): void
    {
        // Purchase ID is validated by readonly string type
    }
}
