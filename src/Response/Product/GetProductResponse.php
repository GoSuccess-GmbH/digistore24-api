<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Get Product Response
 *
 * Response containing product details.
 */
final class GetProductResponse extends AbstractResponse
{
    public string $result { get => $this->result ?? ''; }

    public string $productId { get => $this->productId ?? ''; }

    public string $productName { get => $this->productName ?? ''; }

    public string $productType { get => $this->productType ?? ''; }

    public float $price { get => $this->price ?? 0.0; }

    public string $currency { get => $this->currency ?? 'EUR'; }

    public ?string $description { get => $this->description ?? null; }

    public bool $isPublished { get => $this->isPublished ?? false; }

    public ?string $imageUrl { get => $this->imageUrl ?? null; }

    /** @var array<string, mixed> */
    public array $additionalData { get => $this->additionalData ?? []; }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $productId = $data['product_id'] ?? '';
        $productName = $data['product_name'] ?? '';
        $productType = $data['product_type'] ?? '';
        $price = $data['price'] ?? 0;
        $currency = $data['currency'] ?? 'EUR';
        $description = $data['description'] ?? null;
        $imageUrl = $data['image_url'] ?? null;
        $additionalData = $data['additional_data'] ?? [];
        if (! is_array($additionalData)) {
            $additionalData = [];
        }
        /** @var array<string, mixed> $validatedAdditionalData */
        $validatedAdditionalData = $additionalData;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->productId = TypeConverter::toString($productId) ?? '';
        $response->productName = TypeConverter::toString($productName) ?? '';
        $response->productType = TypeConverter::toString($productType) ?? '';
        $response->price = TypeConverter::toFloat($price) ?? 0.0;
        $response->currency = TypeConverter::toString($currency) ?? 'EUR';
        $response->description = $description !== null ? TypeConverter::toString($description) : null;
        $response->isPublished = TypeConverter::toBool($data['is_published'] ?? false) ?? false;
        $response->imageUrl = $imageUrl !== null ? TypeConverter::toString($imageUrl) : null;
        $response->additionalData = $validatedAdditionalData;
        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
