<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Product\CreateProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\CopyProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\DeleteProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\GetProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\ListProductsRequest;
use GoSuccess\Digistore24\Api\Request\Product\UpdateProductRequest;
use GoSuccess\Digistore24\Api\Response\Product\CreateProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\CopyProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\DeleteProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\GetProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\ListProductsResponse;
use GoSuccess\Digistore24\Api\Response\Product\UpdateProductResponse;

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

    /**
     * Create a new product
     * 
     * Creates a new product on Digistore24 with the specified properties.
     * 
     * @link https://digistore24.com/api/docs/paths/createProduct.yaml OpenAPI Specification
     * 
     * @param CreateProductRequest $request The create product request
     * @return CreateProductResponse The response with the new product ID
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function create(CreateProductRequest $request): CreateProductResponse
    {
        return $this->executeTyped($request, CreateProductResponse::class);
    }

    /**
     * Copy an existing product
     * 
     * Creates a copy of an existing product with optional modifications.
     * 
     * @link https://digistore24.com/api/docs/paths/copyProduct.yaml OpenAPI Specification
     * 
     * @param CopyProductRequest $request The copy product request
     * @return CopyProductResponse The response with the new product ID
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function copy(CopyProductRequest $request): CopyProductResponse
    {
        return $this->executeTyped($request, CopyProductResponse::class);
    }

    /**
     * Update an existing product
     * 
     * Modifies the properties of an existing product.
     * 
     * @link https://digistore24.com/api/docs/paths/updateProduct.yaml OpenAPI Specification
     * 
     * @param UpdateProductRequest $request The update product request
     * @return UpdateProductResponse The response indicating modification status
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function update(UpdateProductRequest $request): UpdateProductResponse
    {
        return $this->executeTyped($request, UpdateProductResponse::class);
    }

    /**
     * Delete a product
     * 
     * Deletes a product from Digistore24. This operation cannot be undone.
     * 
     * @link https://digistore24.com/api/docs/paths/deleteProduct.yaml OpenAPI Specification
     * 
     * @param DeleteProductRequest $request The delete product request
     * @return DeleteProductResponse The response confirming deletion
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function delete(DeleteProductRequest $request): DeleteProductResponse
    {
        return $this->executeTyped($request, DeleteProductResponse::class);
    }
}
