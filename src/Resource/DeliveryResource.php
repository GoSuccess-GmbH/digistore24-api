<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Delivery\GetDeliveryRequest;
use GoSuccess\Digistore24\Api\Request\Delivery\ListDeliveriesRequest;
use GoSuccess\Digistore24\Api\Request\Delivery\UpdateDeliveryRequest;
use GoSuccess\Digistore24\Api\Response\Delivery\GetDeliveryResponse;
use GoSuccess\Digistore24\Api\Response\Delivery\ListDeliveriesResponse;
use GoSuccess\Digistore24\Api\Response\Delivery\UpdateDeliveryResponse;

/**
 * Delivery Resource
 *
 * Provides methods to manage product deliveries and shipping information.
 */
final class DeliveryResource extends AbstractResource
{
    /**
     * Get delivery details for a purchase.
     *
     * @param GetDeliveryRequest $request Request containing purchase ID
     * @return GetDeliveryResponse Response with delivery information
     */
    public function get(GetDeliveryRequest $request): GetDeliveryResponse
    {
        return $this->executeTyped($request, GetDeliveryResponse::class);
    }

    /**
     * Update delivery information for a purchase.
     *
     * @param UpdateDeliveryRequest $request Request with updated delivery data
     * @return UpdateDeliveryResponse Response confirming the update
     */
    public function update(UpdateDeliveryRequest $request): UpdateDeliveryResponse
    {
        return $this->executeTyped($request, UpdateDeliveryResponse::class);
    }

    /**
     * List all deliveries with optional filters.
     *
     * @param ListDeliveriesRequest|null $request Optional request with filter criteria
     * @return ListDeliveriesResponse Response with list of deliveries
     */
    public function list(?ListDeliveriesRequest $request = null): ListDeliveriesResponse
    {
        return $this->executeTyped($request ?? new ListDeliveriesRequest(), ListDeliveriesResponse::class);
    }
}
