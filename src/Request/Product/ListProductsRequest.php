<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Product;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * List Products Request
 *
 * Lists all products in the account.
 */
final class ListProductsRequest extends AbstractRequest
{
    public function __construct(
        public readonly ?string $productType = null,
        public readonly ?bool $onlyPublished = null,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/listProducts';
    }

    public function toArray(): array
    {
        $data = [];

        if ($this->productType !== null) {
            $data['product_type'] = $this->productType;
        }

        if ($this->onlyPublished !== null) {
            $data['only_published'] = $this->onlyPublished ? 'y' : 'n';
        }

        return $data;
    }

    
}
