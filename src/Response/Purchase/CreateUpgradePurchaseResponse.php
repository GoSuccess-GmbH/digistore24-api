<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * New purchase information after upgrade
 */
final readonly class NewPurchaseInfo
{
    public function __construct(
        public string $id,
        public string $billingStatus,
        public float $paidAmount,
        public ?string $nextPaymentAt,
        public ?float $nextAmount,
        public string $currency,
    ) {
    }
}

/**
 * Upgrade information details
 */
final readonly class UpgradeInfo
{
    public function __construct(
        public string $upgradeType,
        public float $upgradeAmountLeft,
        public float $upgradeAmountTotal,
        public string $upgradedPurchaseId,
    ) {
    }
}

/**
 * Response from creating an upgrade purchase
 *
 * @link https://digistore24.com/api/docs/paths/createUpgradePurchase.yaml OpenAPI Specification
 */
final readonly class CreateUpgradePurchaseResponse extends AbstractResponse
{
    public NewPurchaseInfo $newPurchase;
    public UpgradeInfo $upgradeInfo;

    protected function parse(array $data): void
    {
        $responseData = $data['data'];

        $this->newPurchase = new NewPurchaseInfo(
            id: (string)$responseData['new_purchase']['id'],
            billingStatus: (string)$responseData['new_purchase']['billing_status'],
            paidAmount: (float)$responseData['new_purchase']['paid_amount'],
            nextPaymentAt: $responseData['new_purchase']['next_payment_at'] ?? null,
            nextAmount: isset($responseData['new_purchase']['next_amount']) 
                ? (float)$responseData['new_purchase']['next_amount'] 
                : null,
            currency: (string)$responseData['new_purchase']['currency'],
        );

        $this->upgradeInfo = new UpgradeInfo(
            upgradeType: (string)$responseData['upgrade_info']['upgrade_type'],
            upgradeAmountLeft: (float)$responseData['upgrade_info']['upgrade_amount_left'],
            upgradeAmountTotal: (float)$responseData['upgrade_info']['upgrade_amount_total'],
            upgradedPurchaseId: (string)$responseData['upgrade_info']['upgraded_purchase_id'],
        );
    }
}
