<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\ServiceProof\GetServiceProofRequestRequest;
use GoSuccess\Digistore24\Api\Request\ServiceProof\ListServiceProofRequestsRequest;
use GoSuccess\Digistore24\Api\Request\ServiceProof\UpdateServiceProofRequestRequest;
use GoSuccess\Digistore24\Api\Response\ServiceProof\GetServiceProofRequestResponse;
use GoSuccess\Digistore24\Api\Response\ServiceProof\ListServiceProofRequestsResponse;
use GoSuccess\Digistore24\Api\Response\ServiceProof\UpdateServiceProofRequestResponse;

/**
 * Service Proof Resource
 *
 * Provides methods to manage service proof requests and documentation.
 */
final class ServiceProofResource extends AbstractResource
{
    /**
     * Get service proof request details by ID.
     *
     * @param GetServiceProofRequestRequest $request Request containing service proof ID
     * @return GetServiceProofRequestResponse Response with service proof details
     */
    public function get(GetServiceProofRequestRequest $request): GetServiceProofRequestResponse
    {
        return $this->executeTyped($request, GetServiceProofRequestResponse::class);
    }

    /**
     * Update a service proof request.
     *
     * @param UpdateServiceProofRequestRequest $request Request with updated service proof data
     * @return UpdateServiceProofRequestResponse Response confirming the update
     */
    public function update(UpdateServiceProofRequestRequest $request): UpdateServiceProofRequestResponse
    {
        return $this->executeTyped($request, UpdateServiceProofRequestResponse::class);
    }

    /**
     * List all service proof requests with optional filters.
     *
     * @param ListServiceProofRequestsRequest|null $request Optional request with filter criteria
     * @return ListServiceProofRequestsResponse Response with list of service proof requests
     */
    public function list(?ListServiceProofRequestsRequest $request = null): ListServiceProofRequestsResponse
    {
        return $this->executeTyped($request ?? new ListServiceProofRequestsRequest(), ListServiceProofRequestsResponse::class);
    }
}
