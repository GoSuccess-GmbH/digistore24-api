<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;

/**
 * Rebilling Resource
 * 
 * Manage recurring payments and subscriptions.
 * 
 * @link https://digistore24.com/api/docs/tags/rebilling
 */
final class RebillingResource extends AbstractResource
{
    /**
     * Start rebilling for a purchase
     * 
     * TODO: Implement when startRebilling endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/startRebilling.yaml
     * 
     * @example
     * ```php
     * $request = new StartRebillingRequest(purchaseId: 'ABC123');
     * $response = $client->rebilling->start($request);
     * echo "Rebilling started: {$response->success}\n";
     * ```
     */
    // public function start(StartRebillingRequest $request): StartRebillingResponse
    // {
    //     return $this->executeTyped($request, StartRebillingResponse::class);
    // }

    /**
     * Stop rebilling for a purchase
     * 
     * TODO: Implement when stopRebilling endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/stopRebilling.yaml
     */
    // public function stop(StopRebillingRequest $request): StopRebillingResponse
    // {
    //     return $this->executeTyped($request, StopRebillingResponse::class);
    // }

    /**
     * List rebilling status changes
     * 
     * TODO: Implement when listRebillingStatusChanges endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/listRebillingStatusChanges.yaml
     */
    // public function listStatusChanges(ListRebillingStatusChangesRequest $request): ListRebillingStatusChangesResponse
    // {
    //     return $this->executeTyped($request, ListRebillingStatusChangesResponse::class);
    // }

    /**
     * Create rebilling payment
     * 
     * TODO: Implement when createRebillingPayment endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/createRebillingPayment.yaml
     */
    // public function createPayment(CreateRebillingPaymentRequest $request): CreateRebillingPaymentResponse
    // {
    //     return $this->executeTyped($request, CreateRebillingPaymentResponse::class);
    // }
}
