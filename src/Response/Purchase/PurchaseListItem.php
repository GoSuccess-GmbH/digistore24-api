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

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            purchaseId: $data['purchase_id'] ?? '',
            productId: $data['product_id'] ?? '',
            productName: $data['product_name'] ?? '',
            buyerEmail: $data['buyer_email'] ?? '',
            paymentStatus: $data['payment_status'] ?? '',
            amount: (float)($data['amount'] ?? 0),
            currency: $data['currency'] ?? 'EUR',
            createdAt: new DateTimeImmutable($data['created_at'] ?? 'now'),
        );
    }
}
