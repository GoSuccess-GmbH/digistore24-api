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
    public function __construct(private array $productGroup)
    {
    }

    public function getProductGroup(): array
    {
        return $this->productGroup;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        
return new self(productGroup: $innerData['product_group'] ?? []);
    }
}
