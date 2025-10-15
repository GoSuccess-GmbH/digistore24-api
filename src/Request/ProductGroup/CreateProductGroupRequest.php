<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\ProductGroup;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\ProductGroupData;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Product Group Request
 *
 * Creates a new product group for organizing related products.
 */
final class CreateProductGroupRequest extends AbstractRequest
{
    /**
     * @param ProductGroupData $productGroup The product group configuration
     */
    public function __construct(private ProductGroupData $productGroup)
    {
    }

    public function getEndpoint(): string
    {
        return '/createProductGroup';
    }

    public function method(): Method
    {
        return Method::POST;
    }

    public function toArray(): array
    {
        return $this->productGroup->toArray();
    }
}
