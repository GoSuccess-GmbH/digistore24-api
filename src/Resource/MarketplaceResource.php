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
final class MarketplaceResource extends AbstractResource
{
    public function list(ListMarketplaceEntriesRequest $request): ListMarketplaceEntriesResponse
    {
        return $this->executeTyped($request, ListMarketplaceEntriesResponse::class);
    }
    public function get(GetMarketplaceEntryRequest $request): GetMarketplaceEntryResponse
    {
        return $this->executeTyped($request, GetMarketplaceEntryResponse::class);
    }
    public function stats(StatsMarketplaceRequest $request): StatsMarketplaceResponse
    {
        return $this->executeTyped($request, StatsMarketplaceResponse::class);
    }
}
