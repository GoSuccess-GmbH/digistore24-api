<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Shipping\CreateShippingCostPolicyRequest;
use GoSuccess\Digistore24\Api\Request\Shipping\DeleteShippingCostPolicyRequest;
use GoSuccess\Digistore24\Api\Request\Shipping\GetShippingCostPolicyRequest;
use GoSuccess\Digistore24\Api\Request\Shipping\ListShippingCostPoliciesRequest;
use GoSuccess\Digistore24\Api\Request\Shipping\UpdateShippingCostPolicyRequest;
use GoSuccess\Digistore24\Api\Response\Shipping\CreateShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Response\Shipping\DeleteShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Response\Shipping\GetShippingCostPolicyResponse;
use GoSuccess\Digistore24\Api\Response\Shipping\ListShippingCostPoliciesResponse;
use GoSuccess\Digistore24\Api\Response\Shipping\UpdateShippingCostPolicyResponse;

/**
 * Shipping Resource
 *
 * Provides methods to manage shipping cost policies for physical products.
 */
final class ShippingResource extends AbstractResource
{
    /**
     * Create a new shipping cost policy.
     *
     * @param CreateShippingCostPolicyRequest $request Request with shipping policy configuration
     * @return CreateShippingCostPolicyResponse Response with created policy ID
     */
    public function create(CreateShippingCostPolicyRequest $request): CreateShippingCostPolicyResponse
    {
        return $this->executeTyped($request, CreateShippingCostPolicyResponse::class);
    }

    /**
     * Get shipping cost policy details by ID.
     *
     * @param GetShippingCostPolicyRequest $request Request containing policy ID
     * @return GetShippingCostPolicyResponse Response with shipping policy details
     */
    public function get(GetShippingCostPolicyRequest $request): GetShippingCostPolicyResponse
    {
        return $this->executeTyped($request, GetShippingCostPolicyResponse::class);
    }

    /**
     * Update an existing shipping cost policy.
     *
     * @param UpdateShippingCostPolicyRequest $request Request with updated policy data
     * @return UpdateShippingCostPolicyResponse Response confirming the update
     */
    public function update(UpdateShippingCostPolicyRequest $request): UpdateShippingCostPolicyResponse
    {
        return $this->executeTyped($request, UpdateShippingCostPolicyResponse::class);
    }

    /**
     * Delete a shipping cost policy.
     *
     * @param DeleteShippingCostPolicyRequest $request Request containing policy ID
     * @return DeleteShippingCostPolicyResponse Response confirming deletion
     */
    public function delete(DeleteShippingCostPolicyRequest $request): DeleteShippingCostPolicyResponse
    {
        return $this->executeTyped($request, DeleteShippingCostPolicyResponse::class);
    }

    /**
     * List all shipping cost policies with optional filters.
     *
     * @param ListShippingCostPoliciesRequest $request Request with optional filter criteria
     * @return ListShippingCostPoliciesResponse Response with list of shipping policies
     */
    public function list(ListShippingCostPoliciesRequest $request): ListShippingCostPoliciesResponse
    {
        return $this->executeTyped($request, ListShippingCostPoliciesResponse::class);
    }
}
