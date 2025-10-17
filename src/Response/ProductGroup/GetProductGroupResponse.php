<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ProductGroup;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Product Group Response
 *
 * Response object for the ProductGroup API endpoint.
 */
final class GetProductGroupResponse extends AbstractResponse
{
    /** @param array<string, mixed> $productGroup */
    public function __construct(private array $productGroup)
    {
    }

    /** @return array<string, mixed> */
    public function getProductGroup(): array
    {
        return $this->productGroup;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $productGroupData = $innerData['product_group'] ?? [];
        if (! is_array($productGroupData)) {
            $productGroupData = [];
        }
        /** @var array<string, mixed> $validatedProductGroup */
        $validatedProductGroup = $productGroupData;

        return new self(productGroup: $validatedProductGroup);
    }
}
