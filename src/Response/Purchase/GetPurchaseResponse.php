<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Purchase Response
 *
 * Response containing purchase/order details.
 */
final class GetPurchaseResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $additionalData
     */
    public function __construct(
        public readonly string $purchaseId,
        public readonly string $productId,
        public readonly string $productName,
        public readonly string $buyerEmail,
        public readonly string $paymentStatus,
        public readonly string $billingStatus,
        public readonly float $amount,
        public readonly string $currency,
        public readonly \DateTimeInterface $createdAt,
        public readonly array $additionalData,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $purchaseId = $data['purchase_id'] ?? '';
        $productId = $data['product_id'] ?? '';
        $productName = $data['product_name'] ?? '';
        $buyerEmail = $data['buyer_email'] ?? '';
        $paymentStatus = $data['payment_status'] ?? '';
        $billingStatus = $data['billing_status'] ?? '';
        $amount = $data['amount'] ?? 0;
        $currency = $data['currency'] ?? 'EUR';
        $createdAt = $data['created_at'] ?? 'now';
        $additionalData = $data['additional_data'] ?? [];
        if (!is_array($additionalData)) {
            $additionalData = [];
        }
        /** @var array<string, mixed> $validatedAdditionalData */
        $validatedAdditionalData = $additionalData;

        $instance = new self(
            purchaseId: is_string($purchaseId) ? $purchaseId : '',
            productId: is_string($productId) ? $productId : '',
            productName: is_string($productName) ? $productName : '',
            buyerEmail: is_string($buyerEmail) ? $buyerEmail : '',
            paymentStatus: is_string($paymentStatus) ? $paymentStatus : '',
            billingStatus: is_string($billingStatus) ? $billingStatus : '',
            amount: is_float($amount) ? $amount : (is_numeric($amount) ? (float)$amount : 0.0),
            currency: is_string($currency) ? $currency : 'EUR',
            createdAt: new \DateTimeImmutable(is_string($createdAt) ? $createdAt : 'now'),
            additionalData: $validatedAdditionalData,
        );

        return $instance;
    }
}
