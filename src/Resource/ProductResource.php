<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Product\GetProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\ListProductsRequest;
use GoSuccess\Digistore24\Api\Response\Product\GetProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\ListProductsResponse;

/**
 * Product Resource
 * 
 * Manage products and their settings.
 */
final class ProductResource extends AbstractResource
{
    /**
     * Get product details
     * 
     * Retrieves detailed information about a specific product.
     * 
     * @param GetProductRequest $request The get product request
     * @return GetProductResponse The response with product details
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function get(GetProductRequest $request): GetProductResponse
    {
        return $this->executeTyped($request, GetProductResponse::class);
    }

    /**
     * List all products
     * 
     * Retrieves a list of all products, optionally filtered by type or publish status.
     * 
     * @param ListProductsRequest $request The list products request
     * @return ListProductsResponse The response with products list
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function list(ListProductsRequest $request): ListProductsResponse
    {
        return $this->executeTyped($request, ListProductsResponse::class);
    }
}
