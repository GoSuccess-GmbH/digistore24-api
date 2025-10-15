<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
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
        public readonly \DateTimeInterface $createdAt,
    ) {
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            purchaseId: $data['purchase_id'] ?? '',
            productId: $data['product_id'] ?? '',
            productName: $data['product_name'] ?? '',
            buyerEmail: $data['buyer_email'] ?? '',
            paymentStatus: $data['payment_status'] ?? '',
            amount: (float) ($data['amount'] ?? 0),
            currency: $data['currency'] ?? 'EUR',
            createdAt: new \DateTimeImmutable($data['created_at'] ?? 'now'),
        );
    }
}

/**
 * List Purchases Response
 *
 * Response containing a list of purchases.
 */
final class ListPurchasesResponse extends AbstractResponse
{
    /**
     * @param array<PurchaseListItem> $purchases Array of purchase list items
     * @param int $totalCount Total number of purchases
     */
    public function __construct(
        public readonly array $purchases,
        public readonly int $totalCount,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $purchases = [];

        if (isset($data['purchases']) && is_array($data['purchases'])) {
            foreach ($data['purchases'] as $purchase) {
                $purchases[] = PurchaseListItem::fromArray($purchase);
            }
        }

        $instance = new self(
            purchases: $purchases,
            totalCount: (int) ($data['total_count'] ?? count($purchases)),
        );
        return $instance;
    }
}
