<?php

declare(strict_types=1);

namespace Digistore24\Request\Product;

use Digistore24\Base\AbstractRequest;

/**
 * Request to delete a product
 *
 * @link https://digistore24.com/api/docs/paths/deleteProduct.yaml OpenAPI Specification
 */
final readonly class DeleteProductRequest extends AbstractRequest
{
    /**
     * @param int $productId ID of the product to delete
     */
    public function __construct(
        public int $productId,
    ) {
    }

    public function toArray(): array
    {
        return [
            'product_id' => $this->productId,
        ];
    }

    public function validate(): void
    {
        // Product ID is validated by readonly int type
    }
}
