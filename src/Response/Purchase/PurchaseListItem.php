<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use DateTimeImmutable;
use DateTimeInterface;
use GoSuccess\Digistore24\Api\Http\Response;

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
            purchaseId: is_string($purchaseId) ? $purchaseId : '',
            productId: is_string($productId) ? $productId : '',
            productName: is_string($productName) ? $productName : '',
            buyerEmail: is_string($buyerEmail) ? $buyerEmail : '',
            paymentStatus: is_string($paymentStatus) ? $paymentStatus : '',
            amount: is_float($amount) ? $amount : (is_numeric($amount) ? (float)$amount : 0.0),
            currency: is_string($currency) ? $currency : 'EUR',
            createdAt: new DateTimeImmutable(is_string($createdAt) ? $createdAt : 'now'),
        );
    }
}
