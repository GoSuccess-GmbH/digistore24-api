<?php

declare(strict_types=1);

namespace Digistore24\Response\Product;

use Digistore24\Base\AbstractResponse;

/**
 * Response from deleting a product
 *
 * @link https://digistore24.com/api/docs/paths/deleteProduct.yaml OpenAPI Specification
 */
final readonly class DeleteProductResponse extends AbstractResponse
{
    public bool $success;

    protected function parse(array $data): void
    {
        // Successful deletion returns 200 with empty or minimal response
        $this->success = true;
    }
}
