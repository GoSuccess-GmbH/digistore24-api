<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Shipping\CreateShippingCostPolicyRequest;
use GoSuccess\Digistore24\Api\Request\Shipping\GetShippingCostPolicyRequest;
use GoSuccess\Digistore24\Api\Request\Shipping\UpdateShippingCostPolicyRequest;
use GoSuccess\Digistore24\Api\Request\Shipping\DeleteShippingCostPolicyRequest;
use GoSuccess\Digistore24\Api\Request\Shipping\ListShippingCostPoliciesRequest;
use GoSuccess\Digistore24\Api\Response\Shipping\CreateShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Response\Shipping\GetShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Response\Shipping\UpdateShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Response\Shipping\DeleteShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Response\Shipping\ListShippingCostPoliciesResponse;
final class ShippingResource extends AbstractResource
{
    public function create(CreateShippingCostPolicyRequest $request): CreateShippingCostPolicyResponse
    {
        return $this->executeTyped($request, CreateShippingCostPolicyResponse::class);
    }
    public function get(GetShippingCostPolicyRequest $request): GetShippingCostPolicyResponse
    {
        return $this->executeTyped($request, GetShippingCostPolicyResponse::class);
    }
    public function update(UpdateShippingCostPolicyRequest $request): UpdateShippingCostPolicyResponse
    {
        return $this->executeTyped($request, UpdateShippingCostPolicyResponse::class);
    }
    public function delete(DeleteShippingCostPolicyRequest $request): DeleteShippingCostPolicyResponse
    {
        return $this->executeTyped($request, DeleteShippingCostPolicyResponse::class);
    }
    public function list(ListShippingCostPoliciesRequest $request): ListShippingCostPoliciesResponse
    {
        return $this->executeTyped($request, ListShippingCostPoliciesResponse::class);
    }
}
