<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Marketplace\ListMarketplaceEntriesRequest;
use GoSuccess\Digistore24\Api\Request\Marketplace\GetMarketplaceEntryRequest;
use GoSuccess\Digistore24\Api\Request\Marketplace\StatsMarketplaceRequest;
use GoSuccess\Digistore24\Api\Response\Marketplace\ListMarketplaceEntriesResponse;
use GoSuccess\Digistore24\Api\Response\Marketplace\GetMarketplaceEntryResponse;
use GoSuccess\Digistore24\Api\Response\Marketplace\StatsMarketplaceResponse;

/**
 * Marketplace Resource
 *
 * Provides methods to manage marketplace entries and retrieve marketplace statistics.
 */
final class MarketplaceResource extends AbstractResource
{
    /**
     * List all marketplace entries with optional filters.
     *
     * @param ListMarketplaceEntriesRequest $request Request with optional filter criteria
     * @return ListMarketplaceEntriesResponse Response with list of marketplace entries
     */
    public function list(ListMarketplaceEntriesRequest $request): ListMarketplaceEntriesResponse
    {
        return $this->executeTyped($request, ListMarketplaceEntriesResponse::class);
    }

    /**
     * Get detailed information about a marketplace entry.
     *
     * @param GetMarketplaceEntryRequest $request Request containing marketplace entry ID
     * @return GetMarketplaceEntryResponse Response with marketplace entry details
     */
    public function get(GetMarketplaceEntryRequest $request): GetMarketplaceEntryResponse
    {
        return $this->executeTyped($request, GetMarketplaceEntryResponse::class);
    }

    /**
     * Get marketplace statistics.
     *
     * @param StatsMarketplaceRequest $request Request for marketplace statistics
     * @return StatsMarketplaceResponse Response with marketplace statistics
     */
    public function stats(StatsMarketplaceRequest $request): StatsMarketplaceResponse
    {
        return $this->executeTyped($request, StatsMarketplaceResponse::class);
    }
}
