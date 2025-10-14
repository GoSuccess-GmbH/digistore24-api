<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;

/**
 * Product Resource
 * 
 * Manage products and their settings.
 * 
 * @link https://digistore24.com/api/docs/tags/product
 */
final class ProductResource extends AbstractResource
{
    /**
     * Get product information
     * 
     * TODO: Implement when getProduct endpoint request/response classes are added
     * 
     * @link https://digistore24.com/api/docs/paths/getProduct.yaml
     * 
     * @example
     * ```php
     * $request = new GetProductRequest(productId: 12345);
     * $product = $client->products->get($request);
     * echo "Product: {$product->name}\n";
     * ```
     */
    // public function get(GetProductRequest $request): GetProductResponse
    // {
    //     return $this->executeTyped($request, GetProductResponse::class);
    // }

    /**
     * List all products
     * 
     * TODO: Implement when listProducts endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/listProducts.yaml
     */
    // public function list(ListProductsRequest $request): ListProductsResponse
    // {
    //     return $this->executeTyped($request, ListProductsResponse::class);
    // }

    /**
     * Create a new product
     * 
     * TODO: Implement when createProduct endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/createProduct.yaml
     */
    // public function create(CreateProductRequest $request): CreateProductResponse
    // {
    //     return $this->executeTyped($request, CreateProductResponse::class);
    // }

    /**
     * Copy an existing product
     * 
     * TODO: Implement when copyProduct endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/copyProduct.yaml
     */
    // public function copy(CopyProductRequest $request): CopyProductResponse
    // {
    //     return $this->executeTyped($request, CopyProductResponse::class);
    // }
}
