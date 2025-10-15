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
        $instance = new self(
            productId: $data['product_id'] ?? '',
            productName: $data['product_name'] ?? '',
            productType: $data['product_type'] ?? '',
            price: (float)($data['price'] ?? 0),
            currency: $data['currency'] ?? 'EUR',
            description: $data['description'] ?? null,
            isPublished: (bool)($data['is_published'] ?? false),
            imageUrl: $data['image_url'] ?? null,
            additionalData: $data['additional_data'] ?? [],
        );

        return $instance;
    }
}
