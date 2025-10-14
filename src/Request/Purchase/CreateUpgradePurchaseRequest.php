<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Request to create an upgrade purchase
 *
 * @link https://digistore24.com/api/docs/paths/createUpgradePurchase.yaml OpenAPI Specification
 */
final class CreateUpgradePurchaseRequest extends AbstractRequest
{
    /**
     * @param string $purchaseIds Comma-separated list of purchase IDs
     * @param string $upgradeId ID of the upgrade to apply (numeric NNN or with authkey NNN-XXXXXXX)
     * @param string|null $paymentPlanId ID or index (starting with 1) of the payment plan
     * @param array<string, int>|null $quantities Quantities for main product and addons (key = item position or product ID)
     */
    public function __construct(
        public string $purchaseIds,
        public string $upgradeId,
        public ?string $paymentPlanId = null,
        public ?array $quantities = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'purchase_ids' => $this->purchaseIds,
            'upgrade_id' => $this->upgradeId,
        ];

        if ($this->paymentPlanId !== null) {
            $data['payment_plan_id'] = $this->paymentPlanId;
        }
        if ($this->quantities !== null) {
            foreach ($this->quantities as $key => $quantity) {
                $data["quantity[$key]"] = $quantity;
            }
        }

        return $data;
    }

    public function getEndpoint(): string
    {
        return '/createUpgradePurchase';
    }
}