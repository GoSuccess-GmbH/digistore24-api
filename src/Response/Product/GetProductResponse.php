<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Product Response
 *
 * Response containing product details.
 */
final class GetProductResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $additionalData
     */
    public function __construct(
        public readonly string $productId,
        public readonly string $productName,
        public readonly string $productType,
        public readonly float $price,
        public readonly string $currency,
        public readonly ?string $description,
        public readonly bool $isPublished,
        public readonly ?string $imageUrl,
        public readonly array $additionalData,
    ) {
    }

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
        if (!is_array($additionalData)) {
            $additionalData = [];
        }
        /** @var array<string, mixed> $validatedAdditionalData */
        $validatedAdditionalData = $additionalData;

        $instance = new self(
            productId: is_string($productId) ? $productId : '',
            productName: is_string($productName) ? $productName : '',
            productType: is_string($productType) ? $productType : '',
            price: is_float($price) ? $price : (is_numeric($price) ? (float)$price : 0.0),
            currency: is_string($currency) ? $currency : 'EUR',
            description: $description !== null && is_string($description) ? $description : null,
            isPublished: (bool)($data['is_published'] ?? false),
            imageUrl: $imageUrl !== null && is_string($imageUrl) ? $imageUrl : null,
            additionalData: $validatedAdditionalData,
        );

        return $instance;
    }
}
