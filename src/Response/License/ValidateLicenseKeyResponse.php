<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\License;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Response from validating a license key.
 *
 * @see https://digistore24.com/api/docs/paths/validateLicenseKey.yaml
 */
final readonly class ValidateLicenseKeyResponse extends AbstractResponse
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
    ) {}

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
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        $licenseData = $data['data'] ?? [];

        return new self(
            isLicenseValid: (string) ($licenseData['is_license_valid'] ?? 'N'),
            isLicenseKeyFound: (string) ($licenseData['is_license_key_found'] ?? 'N'),
            purchaseId: (string) ($licenseData['purchase_id'] ?? ''),
            licenseKey: (string) ($licenseData['license_key'] ?? ''),
            productId: (int) ($licenseData['product_id'] ?? 0),
            productName: (string) ($licenseData['product_name'] ?? ''),
            billingStatus: (string) ($licenseData['billing_tatus'] ?? ''),
            billingStatusMsg: (string) ($licenseData['billing_tatus_msg'] ?? ''),
            lastPaymentAt: isset($licenseData['last_payment_at']) ? (string) $licenseData['last_payment_at'] : null,
            lastPaymentAtMsg: isset($licenseData['last_payment_at_msg']) ? (string) $licenseData['last_payment_at_msg'] : null,
            nextPaymentAt: isset($licenseData['next_payment_at']) ? (string) $licenseData['next_payment_at'] : null,
            nextPaymentAtMsg: isset($licenseData['next_payment_at_msg']) ? (string) $licenseData['next_payment_at_msg'] : null,
            lastTransactionType: isset($licenseData['last_transaction_type']) ? (string) $licenseData['last_transaction_type'] : null,
            lastTransactionTypeMsg: isset($licenseData['last_transaction_type_msg']) ? (string) $licenseData['last_transaction_type_msg'] : null,
            paidUntil: isset($licenseData['paid_until']) ? (string) $licenseData['paid_until'] : null,
            paidUntilMsg: isset($licenseData['paid_until_msg']) ? (string) $licenseData['paid_until_msg'] : null,
        );
    }
}
