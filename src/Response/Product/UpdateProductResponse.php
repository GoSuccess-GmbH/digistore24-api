<?php

declare(strict_types=1);

namespace Digistore24\Response\Product;

use Digistore24\Base\AbstractResponse;

/**
 * Response from updating a product
 *
 * @link https://digistore24.com/api/docs/paths/updateProduct.yaml OpenAPI Specification
 */
final readonly class UpdateProductResponse extends AbstractResponse
{
    public string $modified;

    protected function parse(array $data): void
    {
        $this->modified = $data['data']['modified'];
    }

    /**
     * Check if the product was successfully modified
     */
    public function wasModified(): bool
    {
        return $this->modified === 'Y';
    }
}
