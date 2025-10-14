<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Eticket\CreateEticketRequest;
use GoSuccess\Digistore24\Api\Response\Eticket\CreateEticketResponse;

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
}
