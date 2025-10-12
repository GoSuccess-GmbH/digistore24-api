<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Resource;

use GoSuccess\Digistore24\Base\AbstractResource;

/**
 * Billing Resource
 * 
 * Manage billing operations and on-demand invoicing.
 * 
 * @link https://digistore24.com/api/docs/tags/billing
 */
final class BillingResource extends AbstractResource
{
    /**
     * Create on-demand billing
     * 
     * TODO: Implement when createBillingOnDemand endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/createBillingOnDemand.yaml
     * 
     * @example
     * ```php
     * $request = new CreateBillingOnDemandRequest(
     *     purchaseId: 'ABC123',
     *     amount: 49.99
     * );
     * $response = $client->billing->createOnDemand($request);
     * ```
     */
    // public function createOnDemand(CreateBillingOnDemandRequest $request): CreateBillingOnDemandResponse
    // {
    //     return $this->executeTyped($request, CreateBillingOnDemandResponse::class);
    // }
}
