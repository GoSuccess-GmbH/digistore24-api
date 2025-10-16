<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Exception\ApiException;
use GoSuccess\Digistore24\Api\Request\Eticket\CreateEticketRequest;
use GoSuccess\Digistore24\Api\Request\Eticket\GetEticketRequest;
use GoSuccess\Digistore24\Api\Request\Eticket\GetEticketSettingsRequest;
use GoSuccess\Digistore24\Api\Request\Eticket\ListEticketLocationsRequest;
use GoSuccess\Digistore24\Api\Request\Eticket\ListEticketsRequest;
use GoSuccess\Digistore24\Api\Request\Eticket\ListEticketTemplatesRequest;
use GoSuccess\Digistore24\Api\Request\Eticket\ValidateEticketRequest;
use GoSuccess\Digistore24\Api\Response\Eticket\CreateEticketResponse;
use GoSuccess\Digistore24\Api\Response\Eticket\GetEticketResponse;
use GoSuccess\Digistore24\Api\Response\Eticket\GetEticketSettingsResponse;
use GoSuccess\Digistore24\Api\Response\Eticket\ListEticketLocationsResponse;
use GoSuccess\Digistore24\Api\Response\Eticket\ListEticketsResponse;
use GoSuccess\Digistore24\Api\Response\Eticket\ListEticketTemplatesResponse;
use GoSuccess\Digistore24\Api\Response\Eticket\ValidateEticketResponse;

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
     * @throws ApiException
     * @return CreateEticketResponse The response with created e-tickets
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
     * @throws ApiException
     * @return GetEticketResponse The response with e-ticket details
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
     * @throws ApiException
     * @return ListEticketsResponse The response with e-ticket list
     */
    public function list(ListEticketsRequest $request): ListEticketsResponse
    {
        return $this->executeTyped($request, ListEticketsResponse::class);
    }

    /**
     * Validate an e-ticket
     *
     * Marks an e-ticket as validated (scanned/used). This is typically used at event
     * check-in to grant access and prevent duplicate entries.
     *
     * @param ValidateEticketRequest $request The validate e-ticket request
     * @throws ApiException
     * @return ValidateEticketResponse The response with validation details
     */
    public function validate(ValidateEticketRequest $request): ValidateEticketResponse
    {
        return $this->executeTyped($request, ValidateEticketResponse::class);
    }

    /**
     * Get e-ticket settings
     *
     * Retrieves the e-ticket configuration settings for the account.
     *
     * @param GetEticketSettingsRequest $request The get e-ticket settings request
     * @throws ApiException
     * @return GetEticketSettingsResponse The response with e-ticket settings
     */
    public function getSettings(GetEticketSettingsRequest $request): GetEticketSettingsResponse
    {
        return $this->executeTyped($request, GetEticketSettingsResponse::class);
    }

    /**
     * List e-ticket locations
     *
     * Retrieves all available e-ticket locations.
     *
     * @param ListEticketLocationsRequest $request The list e-ticket locations request
     * @throws ApiException
     * @return ListEticketLocationsResponse The response with locations list
     */
    public function listLocations(ListEticketLocationsRequest $request): ListEticketLocationsResponse
    {
        return $this->executeTyped($request, ListEticketLocationsResponse::class);
    }

    /**
     * List e-ticket templates
     *
     * Retrieves all available e-ticket templates.
     *
     * @param ListEticketTemplatesRequest $request The list e-ticket templates request
     * @throws ApiException
     * @return ListEticketTemplatesResponse The response with templates list
     */
    public function listTemplates(ListEticketTemplatesRequest $request): ListEticketTemplatesResponse
    {
        return $this->executeTyped($request, ListEticketTemplatesResponse::class);
    }
}
