<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Eticket\CreateEticketRequest;
use GoSuccess\Digistore24\Api\Request\Eticket\GetEticketRequest;
use GoSuccess\Digistore24\Api\Request\Eticket\ListEticketsRequest;
use GoSuccess\Digistore24\Api\Response\Eticket\CreateEticketResponse;
use GoSuccess\Digistore24\Api\Response\Eticket\GetEticketResponse;
use GoSuccess\Digistore24\Api\Response\Eticket\ListEticketsResponse;

/**
 * E-Ticket Resource
 * 
 * Handles operations for managing electronic tickets.
 */
final class EticketResource extends AbstractResource
{
    /**
     * Create free e-tickets for events
     * 
     * @param CreateEticketRequest $request The create e-ticket request
     * @return CreateEticketResponse The response with created e-tickets
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function create(CreateEticketRequest $request): CreateEticketResponse
    {
        return $this->executeTyped($request, CreateEticketResponse::class);
    }

    /**
     * Get e-ticket details
     * 
     * Retrieves detailed information about a specific e-ticket by its order ID.
     * 
     * @param GetEticketRequest $request The get e-ticket request
     * @return GetEticketResponse The response with e-ticket details
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function get(GetEticketRequest $request): GetEticketResponse
    {
        return $this->executeTyped($request, GetEticketResponse::class);
    }

    /**
     * List e-tickets
     * 
     * Retrieves a list of e-tickets, optionally filtered by product, location, or date range.
     * 
     * @param ListEticketsRequest $request The list e-tickets request
     * @return ListEticketsResponse The response with e-ticket list
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function list(ListEticketsRequest $request): ListEticketsResponse
    {
        return $this->executeTyped($request, ListEticketsResponse::class);
    }
}
