<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\OrderForm\CreateOrderformRequest;
use GoSuccess\Digistore24\Api\Request\OrderForm\DeleteOrderformRequest;
use GoSuccess\Digistore24\Api\Request\OrderForm\GetOrderformMetasRequest;
use GoSuccess\Digistore24\Api\Request\OrderForm\GetOrderformRequest;
use GoSuccess\Digistore24\Api\Request\OrderForm\ListOrderformsRequest;
use GoSuccess\Digistore24\Api\Request\OrderForm\UpdateOrderformRequest;
use GoSuccess\Digistore24\Api\Response\OrderForm\CreateOrderformResponse;
use GoSuccess\Digistore24\Api\Response\OrderForm\DeleteOrderformResponse;
use GoSuccess\Digistore24\Api\Response\OrderForm\GetOrderformMetasResponse;
use GoSuccess\Digistore24\Api\Response\OrderForm\GetOrderformResponse;
use GoSuccess\Digistore24\Api\Response\OrderForm\ListOrderformsResponse;
use GoSuccess\Digistore24\Api\Response\OrderForm\UpdateOrderformResponse;

/**
 * Order Form Resource
 *
 * Provides methods to manage order forms (checkout pages).
 */
final class OrderFormResource extends AbstractResource
{
    /**
     * Create a new order form.
     *
     * @param CreateOrderformRequest $request Request with order form configuration
     * @return CreateOrderformResponse Response with created order form details
     */
    public function create(CreateOrderformRequest $request): CreateOrderformResponse
    {
        return $this->executeTyped($request, CreateOrderformResponse::class);
    }

    /**
     * Get order form details by ID.
     *
     * @param GetOrderformRequest $request Request containing order form ID
     * @return GetOrderformResponse Response with order form details
     */
    public function get(GetOrderformRequest $request): GetOrderformResponse
    {
        return $this->executeTyped($request, GetOrderformResponse::class);
    }

    /**
     * Update an existing order form.
     *
     * @param UpdateOrderformRequest $request Request with updated order form data
     * @return UpdateOrderformResponse Response confirming the update
     */
    public function update(UpdateOrderformRequest $request): UpdateOrderformResponse
    {
        return $this->executeTyped($request, UpdateOrderformResponse::class);
    }

    /**
     * Delete an order form.
     *
     * @param DeleteOrderformRequest $request Request containing order form ID
     * @return DeleteOrderformResponse Response confirming deletion
     */
    public function delete(DeleteOrderformRequest $request): DeleteOrderformResponse
    {
        return $this->executeTyped($request, DeleteOrderformResponse::class);
    }

    /**
     * List all order forms with optional filters.
     *
     * @param ListOrderformsRequest $request Request with optional filter criteria
     * @return ListOrderformsResponse Response with list of order forms
     */
    public function list(ListOrderformsRequest $request): ListOrderformsResponse
    {
        return $this->executeTyped($request, ListOrderformsResponse::class);
    }

    /**
     * Get order form metadata options.
     *
     * @param GetOrderformMetasRequest $request Request for metadata
     * @return GetOrderformMetasResponse Response with metadata options
     */
    public function getMetas(GetOrderformMetasRequest $request): GetOrderformMetasResponse
    {
        return $this->executeTyped($request, GetOrderformMetasResponse::class);
    }
}
