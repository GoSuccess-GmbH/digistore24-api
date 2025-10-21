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
    public string $result { get => $this->result ?? ''; }

    public string $purchaseId { get => $this->purchaseId ?? ''; }

    public string $productId { get => $this->productId ?? ''; }

    public string $productName { get => $this->productName ?? ''; }

    public string $buyerEmail { get => $this->buyerEmail ?? ''; }

    public string $paymentStatus { get => $this->paymentStatus ?? ''; }

    public string $billingStatus { get => $this->billingStatus ?? ''; }

    public float $amount { get => $this->amount ?? 0.0; }

    public string $currency { get => $this->currency ?? 'EUR'; }

    public \DateTimeInterface $createdAt { get => $this->createdAt ?? new \DateTimeImmutable(); }

    /** @var array<string, mixed> */
    public array $additionalData { get => $this->additionalData ?? []; }

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

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->purchaseId = TypeConverter::toString($purchaseId) ?? '';
        $response->productId = TypeConverter::toString($productId) ?? '';
        $response->productName = TypeConverter::toString($productName) ?? '';
        $response->buyerEmail = TypeConverter::toString($buyerEmail) ?? '';
        $response->paymentStatus = TypeConverter::toString($paymentStatus) ?? '';
        $response->billingStatus = TypeConverter::toString($billingStatus) ?? '';
        $response->amount = TypeConverter::toFloat($amount) ?? 0.0;
        $response->currency = TypeConverter::toString($currency) ?? 'EUR';
        $response->createdAt = TypeConverter::toDateTime($createdAt) ?? new \DateTimeImmutable();
        $response->additionalData = $validatedAdditionalData;
        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
