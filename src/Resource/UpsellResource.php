<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Upsell\GetUpsellsRequest;
use GoSuccess\Digistore24\Api\Request\Upsell\UpdateUpsellsRequest;
use GoSuccess\Digistore24\Api\Request\Upsell\DeleteUpsellsRequest;
use GoSuccess\Digistore24\Api\Response\Upsell\GetUpsellsResponse;
use GoSuccess\Digistore24\Api\Response\Upsell\UpdateUpsellsResponse;
use GoSuccess\Digistore24\Api\Response\Upsell\DeleteUpsellsResponse;

/**
 * Upsell Resource
 *
 * Provides methods to manage upsell offers for products.
 */
final class UpsellResource extends AbstractResource
{
    /**
     * Get upsell configuration for a product.
     *
     * @param GetUpsellsRequest $request Request containing product ID
     * @return GetUpsellsResponse Response with upsell configuration
     */
    public function get(GetUpsellsRequest $request): GetUpsellsResponse
    {
        return $this->executeTyped($request, GetUpsellsResponse::class);
    }

    /**
     * Update upsell configuration.
     *
     * @param UpdateUpsellsRequest $request Request with updated upsell data
     * @return UpdateUpsellsResponse Response confirming the update
     */
    public function update(UpdateUpsellsRequest $request): UpdateUpsellsResponse
    {
        return $this->executeTyped($request, UpdateUpsellsResponse::class);
    }

    /**
     * Delete upsell configuration.
     *
     * @param DeleteUpsellsRequest $request Request containing product ID
     * @return DeleteUpsellsResponse Response confirming deletion
     */
    public function delete(DeleteUpsellsRequest $request): DeleteUpsellsResponse
    {
        return $this->executeTyped($request, DeleteUpsellsResponse::class);
    }
}
