<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use DateTimeImmutable;
use DateTimeInterface;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Purchase List Item
 *
 * Represents a purchase in a list.
 */
final class PurchaseListItem
{
    public function __construct(
        public readonly string $purchaseId,
        public readonly string $productId,
        public readonly string $productName,
        public readonly string $buyerEmail,
        public readonly string $paymentStatus,
        public readonly float $amount,
        public readonly string $currency,
        public readonly DateTimeInterface $createdAt,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $purchaseId = $data['purchase_id'] ?? '';
        $productId = $data['product_id'] ?? '';
        $productName = $data['product_name'] ?? '';
        $buyerEmail = $data['buyer_email'] ?? '';
        $paymentStatus = $data['payment_status'] ?? '';
        $amount = $data['amount'] ?? 0;
        $currency = $data['currency'] ?? 'EUR';
        $createdAt = $data['created_at'] ?? 'now';

        return new self(
            purchaseId: TypeConverter::toString($purchaseId) ?? '',
            productId: TypeConverter::toString($productId) ?? '',
            productName: TypeConverter::toString($productName) ?? '',
            buyerEmail: TypeConverter::toString($buyerEmail) ?? '',
            paymentStatus: TypeConverter::toString($paymentStatus) ?? '',
            amount: TypeConverter::toFloat($amount) ?? 0.0,
            currency: TypeConverter::toString($currency) ?? 'EUR',
            createdAt: TypeConverter::toDateTime($createdAt) ?? new DateTimeImmutable(),
        );
    }
}
