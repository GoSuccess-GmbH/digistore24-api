<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\ProductGroup\CreateProductGroupRequest;
use GoSuccess\Digistore24\Api\Request\ProductGroup\DeleteProductGroupRequest;
use GoSuccess\Digistore24\Api\Request\ProductGroup\GetProductGroupRequest;
use GoSuccess\Digistore24\Api\Request\ProductGroup\ListProductGroupsRequest;
use GoSuccess\Digistore24\Api\Request\ProductGroup\UpdateProductGroupRequest;
use GoSuccess\Digistore24\Api\Response\ProductGroup\CreateProductGroupResponse;
use GoSuccess\Digistore24\Api\Response\ProductGroup\DeleteProductGroupResponse;
use GoSuccess\Digistore24\Api\Response\ProductGroup\GetProductGroupResponse;
use GoSuccess\Digistore24\Api\Response\ProductGroup\ListProductGroupsResponse;
use GoSuccess\Digistore24\Api\Response\ProductGroup\UpdateProductGroupResponse;

/**
 * Product Group Resource
 *
 * Provides methods to manage product groups for organizing products.
 */
final class ProductGroupResource extends AbstractResource
{
    /**
     * Create a new product group.
     *
     * @param CreateProductGroupRequest $request Request with product group details
     * @return CreateProductGroupResponse Response with created product group ID
     */
    public function create(CreateProductGroupRequest $request): CreateProductGroupResponse
    {
        return $this->executeTyped($request, CreateProductGroupResponse::class);
    }

    /**
     * Get product group details by ID.
     *
     * @param GetProductGroupRequest $request Request containing product group ID
     * @return GetProductGroupResponse Response with product group details
     */
    public function get(GetProductGroupRequest $request): GetProductGroupResponse
    {
        return $this->executeTyped($request, GetProductGroupResponse::class);
    }

    /**
     * Update an existing product group.
     *
     * @param UpdateProductGroupRequest $request Request with updated product group data
     * @return UpdateProductGroupResponse Response confirming the update
     */
    public function update(UpdateProductGroupRequest $request): UpdateProductGroupResponse
    {
        return $this->executeTyped($request, UpdateProductGroupResponse::class);
    }

    /**
     * Delete a product group.
     *
     * @param DeleteProductGroupRequest $request Request containing product group ID
     * @return DeleteProductGroupResponse Response confirming deletion
     */
    public function delete(DeleteProductGroupRequest $request): DeleteProductGroupResponse
    {
        return $this->executeTyped($request, DeleteProductGroupResponse::class);
    }

    /**
     * List all product groups with optional filters.
     *
     * @param ListProductGroupsRequest $request Request with optional filter criteria
     * @return ListProductGroupsResponse Response with list of product groups
     */
    public function list(ListProductGroupsRequest $request): ListProductGroupsResponse
    {
        return $this->executeTyped($request, ListProductGroupsResponse::class);
    }
}
