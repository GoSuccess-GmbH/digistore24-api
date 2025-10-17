<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

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
        if (! is_array($additionalData)) {
            $additionalData = [];
        }
        /** @var array<string, mixed> $validatedAdditionalData */
        $validatedAdditionalData = $additionalData;

        $instance = new self(
            purchaseId: TypeConverter::toString($purchaseId) ?? '',
            productId: TypeConverter::toString($productId) ?? '',
            productName: TypeConverter::toString($productName) ?? '',
            buyerEmail: TypeConverter::toString($buyerEmail) ?? '',
            paymentStatus: TypeConverter::toString($paymentStatus) ?? '',
            billingStatus: TypeConverter::toString($billingStatus) ?? '',
            amount: TypeConverter::toFloat($amount) ?? 0.0,
            currency: TypeConverter::toString($currency) ?? 'EUR',
            createdAt: TypeConverter::toDateTime($createdAt) ?? new \DateTimeImmutable(),
            additionalData: $validatedAdditionalData,
        );

        return $instance;
    }
}
