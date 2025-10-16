<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

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
                if (!is_array($product)) {
                    continue;
                }
                /** @var array<string, mixed> $validatedProduct */
                $validatedProduct = $product;
                $products[] = ProductListItem::fromArray($validatedProduct);
            }
        }

        $instance = new self(
            products: $products,
            totalCount: count($products), // DS24 API doesn't return total_count, so we count the array
        );

        return $instance;
    }
}
