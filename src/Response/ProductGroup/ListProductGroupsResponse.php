<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ProductGroup;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * List Product Groups Response
 *
 * Response object for the ProductGroup API endpoint.
 */
final readonly class ListProductGroupsResponse extends AbstractResponse
{
    public function __construct(private array $productGroups)
    {
    }

    public function getProductGroups(): array
    {
        return $this->productGroups;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(productGroups: $data['data']['product_groups'] ?? []);
    }
}