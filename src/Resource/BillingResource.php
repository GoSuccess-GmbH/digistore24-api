<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Billing\CreateBillingOnDemandRequest;
use GoSuccess\Digistore24\Api\Request\Billing\RefundPartiallyRequest;
use GoSuccess\Digistore24\Api\Response\Billing\CreateBillingOnDemandResponse;
use GoSuccess\Digistore24\Api\Response\Billing\RefundPartiallyResponse;

/**
 * Billing Resource
 *
 * Manage billing operations including on-demand billing and partial refunds.
 */
final class BillingResource extends AbstractResource
{
    /**
     * Create a billing on demand order
     *
     * Creates a customized order that uses the payment method from a reference purchase.
     * This allows creating new orders without requiring the customer to re-enter payment details.
     *
     * Requirements:
     * - "Billing on demand" right must be enabled for the vendor account
     * - Reference purchase must use a payment method that supports rebilling
     *
     * @link https://digistore24.com/api/docs/paths/createBillingOnDemand.yaml OpenAPI Specification
     *
     * @param CreateBillingOnDemandRequest $request The billing on demand request
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @throws \GoSuccess\Digistore24\Api\Exception\ForbiddenException If billing on demand is not enabled
     * @return CreateBillingOnDemandResponse The response with created order details
     */
    public function createOnDemand(CreateBillingOnDemandRequest $request): CreateBillingOnDemandResponse
    {
        return $this->executeTyped($request, CreateBillingOnDemandResponse::class);
    }

    /**
     * Partially refund a purchase
     *
     * Refunds a partial amount of a payment (not the complete payment).
     * The refund amount is treated as a discount. The order status does not change.
     *
     * Important:
     * - Only refunds a portion of the payment
     * - Amount must not exceed the payment amount
     * - Order status remains unchanged (use PurchaseResource::refund() for full refunds)
     *
     * @link https://digistore24.com/api/docs/paths/refundPartially.yaml OpenAPI Specification
     *
     * @param RefundPartiallyRequest $request The partial refund request
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @return RefundPartiallyResponse The response with refund result
     */
    public function refundPartially(RefundPartiallyRequest $request): RefundPartiallyResponse
    {
        return $this->executeTyped($request, RefundPartiallyResponse::class);
    }
}
