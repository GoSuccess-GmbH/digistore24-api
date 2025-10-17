<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ProductGroup;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Product Groups Response
 *
 * Response object for the ProductGroup API endpoint.
 */
final class ListProductGroupsResponse extends AbstractResponse
{
    /** @param array<string, mixed> $productGroups */
    public function __construct(private array $productGroups)
    {
    }

    /** @return array<string, mixed> */
    public function getProductGroups(): array
    {
        return $this->productGroups;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $productGroupsData = $innerData['product_groups'] ?? [];
        if (! is_array($productGroupsData)) {
            $productGroupsData = [];
        }
        /** @var array<string, mixed> $validatedProductGroups */
        $validatedProductGroups = $productGroupsData;

        return new self(productGroups: $validatedProductGroups);
    }
}
