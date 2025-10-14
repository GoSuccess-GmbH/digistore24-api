<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Product;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Get Product Request
 *
 * Retrieves details of a specific product.
 */
final class GetProductRequest extends AbstractRequest
{
    public function __construct(
        public readonly string $productId,
    ) {
    }

    public function endpoint(): string
    {
        return '/getProduct';
    }

    public function toArray(): array
    {
        return [
            'product_id' => $this->productId,
        ];
    }

    public function validate(): array
    {
        return [];
    }
}
