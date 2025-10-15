<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Rebilling\CreateRebillingPaymentRequest;
use GoSuccess\Digistore24\Api\Request\Rebilling\StartRebillingRequest;
use GoSuccess\Digistore24\Api\Request\Rebilling\StopRebillingRequest;
use GoSuccess\Digistore24\Api\Request\Rebilling\ListRebillingStatusChangesRequest;
use GoSuccess\Digistore24\Api\Response\Rebilling\CreateRebillingPaymentResponse;
use GoSuccess\Digistore24\Api\Response\Rebilling\StartRebillingResponse;
use GoSuccess\Digistore24\Api\Response\Rebilling\StopRebillingResponse;
use GoSuccess\Digistore24\Api\Response\Rebilling\ListRebillingStatusChangesResponse;

/**
 * Rebilling Resource
 *
 * Provides methods to manage recurring payments and subscription rebilling.
 */
final class RebillingResource extends AbstractResource
{
    /**
     * Create a rebilling payment manually.
     *
     * @param CreateRebillingPaymentRequest $request Request to create rebilling payment
     * @return CreateRebillingPaymentResponse Response with payment details
     */
    public function createPayment(CreateRebillingPaymentRequest $request): CreateRebillingPaymentResponse
    {
        return $this->executeTyped($request, CreateRebillingPaymentResponse::class);
    }

    /**
     * Start or resume rebilling for a purchase.
     *
     * @param StartRebillingRequest $request Request containing purchase ID
     * @return StartRebillingResponse Response confirming rebilling started
     */
    public function start(StartRebillingRequest $request): StartRebillingResponse
    {
        return $this->executeTyped($request, StartRebillingResponse::class);
    }

    /**
     * Stop or pause rebilling for a purchase.
     *
     * @param StopRebillingRequest $request Request containing purchase ID
     * @return StopRebillingResponse Response confirming rebilling stopped
     */
    public function stop(StopRebillingRequest $request): StopRebillingResponse
    {
        return $this->executeTyped($request, StopRebillingResponse::class);
    }

    /**
     * List rebilling status changes with optional filters.
     *
     * @param ListRebillingStatusChangesRequest $request Request with optional filter criteria
     * @return ListRebillingStatusChangesResponse Response with list of status changes
     */
    public function listStatusChanges(ListRebillingStatusChangesRequest $request): ListRebillingStatusChangesResponse
    {
        return $this->executeTyped($request, ListRebillingStatusChangesResponse::class);
    }
}
