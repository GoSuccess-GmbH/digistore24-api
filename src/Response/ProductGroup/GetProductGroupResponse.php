<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ProductGroup;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Get Product Group Response
 *
 * Response object for the ProductGroup API endpoint.
 */
final readonly class GetProductGroupResponse extends AbstractResponse
{
    public function __construct(private array $productGroup)
    {
    }

    public function getProductGroup(): array
    {
        return $this->productGroup;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(productGroup: $data['data']['product_group'] ?? []);
    }
}