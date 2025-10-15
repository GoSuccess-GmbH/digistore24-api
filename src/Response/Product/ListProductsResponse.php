<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Product List Item
 *
 * Represents a product in a list.
 */
final class ProductListItem
{
    public function __construct(
        public readonly string $productId,
        public readonly string $productName,
        public readonly string $productType,
        public readonly float $price,
        public readonly string $currency,
        public readonly bool $isPublished,
        public readonly ?\DateTimeInterface $createdAt,
    ) {
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            productId: $data['product_id'] ?? '',
            productName: $data['product_name'] ?? '',
            productType: $data['product_type'] ?? '',
            price: (float) ($data['price'] ?? 0),
            currency: $data['currency'] ?? 'EUR',
            isPublished: (bool) ($data['is_published'] ?? false),
            createdAt: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
        );
    }
}

/**
 * List Products Response
 *
 * Response containing a list of products.
 */
final class ListProductsResponse extends AbstractResponse
{
    /**
     * @param array<ProductListItem> $products Array of product list items
     * @param int $totalCount Total number of products
     */
    public function __construct(
        public readonly array $products,
        public readonly int $totalCount,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $products = [];

        if (isset($data['products']) && is_array($data['products'])) {
            foreach ($data['products'] as $product) {
                $products[] = ProductListItem::fromArray($product);
            }
        }

        $instance = new self(
            products: $products,
            totalCount: (int) ($data['total_count'] ?? count($products)),
        );
        return $instance;
    }
}
