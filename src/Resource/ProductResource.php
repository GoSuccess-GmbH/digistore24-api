<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Exception\ApiException;
use GoSuccess\Digistore24\Api\Request\Product\CopyProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\CreateProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\DeleteProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\GetProductRequest;
use GoSuccess\Digistore24\Api\Request\Product\ListProductsRequest;
use GoSuccess\Digistore24\Api\Request\Product\ListProductTypesRequest;
use GoSuccess\Digistore24\Api\Request\Product\UpdateProductRequest;
use GoSuccess\Digistore24\Api\Response\Product\CopyProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\CreateProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\DeleteProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\GetProductResponse;
use GoSuccess\Digistore24\Api\Response\Product\ListProductsResponse;
use GoSuccess\Digistore24\Api\Response\Product\ListProductTypesResponse;
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
     * @throws ApiException
     * @return GetProductResponse The response with product details
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
     * @param ListProductsRequest|null $request Optional list products request with filters
     * @throws ApiException
     * @return ListProductsResponse The response with products list
     */
    public function list(?ListProductsRequest $request = null): ListProductsResponse
    {
        return $this->executeTyped($request ?? new ListProductsRequest(), ListProductsResponse::class);
    }

    /**
     * Create a new product
     *
     * Creates a new product on Digistore24 with the specified properties.
     *
     * @link https://digistore24.com/api/docs/paths/createProduct.yaml OpenAPI Specification
     *
     * @param CreateProductRequest $request The create product request
     * @throws ApiException
     * @return CreateProductResponse The response with the new product ID
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
     * @throws ApiException
     * @return CopyProductResponse The response with the new product ID
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
     * @throws ApiException
     * @return UpdateProductResponse The response indicating modification status
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
     * @throws ApiException
     * @return DeleteProductResponse The response confirming deletion
     */
    public function delete(DeleteProductRequest $request): DeleteProductResponse
    {
        return $this->executeTyped($request, DeleteProductResponse::class);
    }

    /**
     * List all available product types
     *
     * Returns a list of all product types available in Digistore24. Use these
     * product type IDs when creating or updating products with the createProduct
     * or updateProduct endpoints.
     *
     * @link https://digistore24.com/api/docs/paths/listProductTypes.yaml OpenAPI Specification
     *
     * @param ListProductTypesRequest|null $request Optional list product types request
     * @throws ApiException
     * @return ListProductTypesResponse The response with all available product types
     */
    public function listProductTypes(?ListProductTypesRequest $request = null): ListProductTypesResponse
    {
        return $this->executeTyped($request ?? new ListProductTypesRequest(), ListProductTypesResponse::class);
    }
}
