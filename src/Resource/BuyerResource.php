<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Buyer\GetBuyerRequest;
use GoSuccess\Digistore24\Api\Request\Buyer\ListBuyersRequest;
use GoSuccess\Digistore24\Api\Request\Buyer\UpdateBuyerRequest;
use GoSuccess\Digistore24\Api\Response\Buyer\GetBuyerResponse;
use GoSuccess\Digistore24\Api\Response\Buyer\ListBuyersResponse;
use GoSuccess\Digistore24\Api\Response\Buyer\UpdateBuyerResponse;

/**
 * Buyer Resource
 *
 * Provides methods to manage buyer information and retrieve buyer data.
 */
final class BuyerResource extends AbstractResource
{
    /**
     * Get buyer information by email or buyer ID.
     *
     * @param GetBuyerRequest $request Request containing buyer identifier
     * @return GetBuyerResponse Response with buyer details
     */
    public function get(GetBuyerRequest $request): GetBuyerResponse
    {
        return $this->executeTyped($request, GetBuyerResponse::class);
    }

    /**
     * List all buyers with optional filters.
     *
     * @param ListBuyersRequest $request Request with optional filter criteria
     * @return ListBuyersResponse Response with list of buyers
     */
    public function list(ListBuyersRequest $request): ListBuyersResponse
    {
        return $this->executeTyped($request, ListBuyersResponse::class);
    }

    /**
     * Update buyer information.
     *
     * @param UpdateBuyerRequest $request Request with updated buyer data
     * @return UpdateBuyerResponse Response confirming the update
     */
    public function update(UpdateBuyerRequest $request): UpdateBuyerResponse
    {
        return $this->executeTyped($request, UpdateBuyerResponse::class);
    }
}
