<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\ProductGroup\CreateProductGroupRequest;
use GoSuccess\Digistore24\Api\Request\ProductGroup\GetProductGroupRequest;
use GoSuccess\Digistore24\Api\Request\ProductGroup\UpdateProductGroupRequest;
use GoSuccess\Digistore24\Api\Request\ProductGroup\DeleteProductGroupRequest;
use GoSuccess\Digistore24\Api\Request\ProductGroup\ListProductGroupsRequest;
use GoSuccess\Digistore24\Api\Response\ProductGroup\CreateProductGroupResponse;
use GoSuccess\Digistore24\Api\Response\ProductGroup\GetProductGroupResponse;
use GoSuccess\Digistore24\Api\Response\ProductGroup\UpdateProductGroupResponse;
use GoSuccess\Digistore24\Api\Response\ProductGroup\DeleteProductGroupResponse;
use GoSuccess\Digistore24\Api\Response\ProductGroup\ListProductGroupsResponse;
final class ProductGroupResource extends AbstractResource
{
    public function create(CreateProductGroupRequest $request): CreateProductGroupResponse
    {
        return $this->executeTyped($request, CreateProductGroupResponse::class);
    }
    public function get(GetProductGroupRequest $request): GetProductGroupResponse
    {
        return $this->executeTyped($request, GetProductGroupResponse::class);
    }
    public function update(UpdateProductGroupRequest $request): UpdateProductGroupResponse
    {
        return $this->executeTyped($request, UpdateProductGroupResponse::class);
    }
    public function delete(DeleteProductGroupRequest $request): DeleteProductGroupResponse
    {
        return $this->executeTyped($request, DeleteProductGroupResponse::class);
    }
    public function list(ListProductGroupsRequest $request): ListProductGroupsResponse
    {
        return $this->executeTyped($request, ListProductGroupsResponse::class);
    }
}
