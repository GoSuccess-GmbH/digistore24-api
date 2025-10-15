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
        $instance = new self(
            purchaseId: $data['purchase_id'] ?? '',
            productId: $data['product_id'] ?? '',
            productName: $data['product_name'] ?? '',
            buyerEmail: $data['buyer_email'] ?? '',
            paymentStatus: $data['payment_status'] ?? '',
            billingStatus: $data['billing_status'] ?? '',
            amount: (float) ($data['amount'] ?? 0),
            currency: $data['currency'] ?? 'EUR',
            createdAt: new \DateTimeImmutable($data['created_at'] ?? 'now'),
            additionalData: $data['additional_data'] ?? [],
        );
        return $instance;
    }
}
