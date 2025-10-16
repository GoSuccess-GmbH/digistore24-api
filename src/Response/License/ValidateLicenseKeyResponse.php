<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\License;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Response from validating a license key.
 *
 * @see https://digistore24.com/api/docs/paths/validateLicenseKey.yaml
 */
final class ValidateLicenseKeyResponse extends AbstractResponse
{
    public function __construct(
        private string $isLicenseValid,
        private string $isLicenseKeyFound,
        private string $purchaseId,
        private string $licenseKey,
        private int $productId,
        private string $productName,
        private string $billingStatus,
        private string $billingStatusMsg,
        private ?string $lastPaymentAt,
        private ?string $lastPaymentAtMsg,
        private ?string $nextPaymentAt,
        private ?string $nextPaymentAtMsg,
        private ?string $lastTransactionType,
        private ?string $lastTransactionTypeMsg,
        private ?string $paidUntil,
        private ?string $paidUntilMsg,
    ) {
    }

    public function isValid(): bool
    {
        return $this->isLicenseValid === 'Y';
    }

    public function isFound(): bool
    {
        return $this->isLicenseKeyFound === 'Y';
    }

    public function getIsLicenseValid(): string
    {
        return $this->isLicenseValid;
    }

    public function getIsLicenseKeyFound(): string
    {
        return $this->isLicenseKeyFound;
    }

    public function getPurchaseId(): string
    {
        return $this->purchaseId;
    }

    public function getLicenseKey(): string
    {
        return $this->licenseKey;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getBillingStatus(): string
    {
        return $this->billingStatus;
    }

    public function getBillingStatusMsg(): string
    {
        return $this->billingStatusMsg;
    }

    public function getLastPaymentAt(): ?string
    {
        return $this->lastPaymentAt;
    }

    public function getLastPaymentAtMsg(): ?string
    {
        return $this->lastPaymentAtMsg;
    }

    public function getNextPaymentAt(): ?string
    {
        return $this->nextPaymentAt;
    }

    public function getNextPaymentAtMsg(): ?string
    {
        return $this->nextPaymentAtMsg;
    }

    public function getLastTransactionType(): ?string
    {
        return $this->lastTransactionType;
    }

    public function getLastTransactionTypeMsg(): ?string
    {
        return $this->lastTransactionTypeMsg;
    }

    public function getPaidUntil(): ?string
    {
        return $this->paidUntil;
    }

    public function getPaidUntilMsg(): ?string
    {
        return $this->paidUntilMsg;
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $licenseData = $data['data'] ?? [];
        if (!is_array($licenseData)) {
            $licenseData = [];
        }

        $isLicenseValid = $licenseData['is_license_valid'] ?? 'N';
        $isLicenseKeyFound = $licenseData['is_license_key_found'] ?? 'N';
        $purchaseId = $licenseData['purchase_id'] ?? '';
        $licenseKey = $licenseData['license_key'] ?? '';
        $productId = $licenseData['product_id'] ?? 0;
        $productName = $licenseData['product_name'] ?? '';
        $billingStatus = $licenseData['billing_tatus'] ?? '';
        $billingStatusMsg = $licenseData['billing_tatus_msg'] ?? '';
        $lastPaymentAt = $licenseData['last_payment_at'] ?? null;
        $lastPaymentAtMsg = $licenseData['last_payment_at_msg'] ?? null;
        $nextPaymentAt = $licenseData['next_payment_at'] ?? null;
        $nextPaymentAtMsg = $licenseData['next_payment_at_msg'] ?? null;
        $lastTransactionType = $licenseData['last_transaction_type'] ?? null;
        $lastTransactionTypeMsg = $licenseData['last_transaction_type_msg'] ?? null;
        $paidUntil = $licenseData['paid_until'] ?? null;
        $paidUntilMsg = $licenseData['paid_until_msg'] ?? null;

        return new self(
            isLicenseValid: is_string($isLicenseValid) ? $isLicenseValid : 'N',
            isLicenseKeyFound: is_string($isLicenseKeyFound) ? $isLicenseKeyFound : 'N',
            purchaseId: is_string($purchaseId) ? $purchaseId : '',
            licenseKey: is_string($licenseKey) ? $licenseKey : '',
            productId: is_int($productId) ? $productId : 0,
            productName: is_string($productName) ? $productName : '',
            billingStatus: is_string($billingStatus) ? $billingStatus : '',
            billingStatusMsg: is_string($billingStatusMsg) ? $billingStatusMsg : '',
            lastPaymentAt: $lastPaymentAt !== null && is_string($lastPaymentAt) ? $lastPaymentAt : null,
            lastPaymentAtMsg: $lastPaymentAtMsg !== null && is_string($lastPaymentAtMsg) ? $lastPaymentAtMsg : null,
            nextPaymentAt: $nextPaymentAt !== null && is_string($nextPaymentAt) ? $nextPaymentAt : null,
            nextPaymentAtMsg: $nextPaymentAtMsg !== null && is_string($nextPaymentAtMsg) ? $nextPaymentAtMsg : null,
            lastTransactionType: $lastTransactionType !== null && is_string($lastTransactionType) ? $lastTransactionType : null,
            lastTransactionTypeMsg: $lastTransactionTypeMsg !== null && is_string($lastTransactionTypeMsg) ? $lastTransactionTypeMsg : null,
            paidUntil: $paidUntil !== null && is_string($paidUntil) ? $paidUntil : null,
            paidUntilMsg: $paidUntilMsg !== null && is_string($paidUntilMsg) ? $paidUntilMsg : null,
        );
    }
}
