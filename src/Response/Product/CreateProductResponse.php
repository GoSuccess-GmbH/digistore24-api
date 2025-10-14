<?php

declare(strict_types=1);

namespace Digistore24\Response\Product;

use Digistore24\Base\AbstractResponse;

/**
 * Response from creating a product
 *
 * @link https://digistore24.com/api/docs/paths/createProduct.yaml OpenAPI Specification
 */
final readonly class CreateProductResponse extends AbstractResponse
{
    public int $productId;

    protected function parse(array $data): void
    {
        $this->productId = (int)$data['product_id'];
    }
}
