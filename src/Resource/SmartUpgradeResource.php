<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\SmartUpgrade\GetSmartupgradeRequest;
use GoSuccess\Digistore24\Api\Request\SmartUpgrade\ListSmartUpgradesRequest;
use GoSuccess\Digistore24\Api\Response\SmartUpgrade\GetSmartupgradeResponse;
use GoSuccess\Digistore24\Api\Response\SmartUpgrade\ListSmartUpgradesResponse;

/**
 * Smart Upgrade Resource
 *
 * Provides methods to manage smart upgrades for automated product upgrades.
 */
final class SmartUpgradeResource extends AbstractResource
{
    /**
     * Get smart upgrade details by ID.
     *
     * @param GetSmartupgradeRequest $request Request containing smart upgrade ID
     * @return GetSmartupgradeResponse Response with smart upgrade details
     */
    public function get(GetSmartupgradeRequest $request): GetSmartupgradeResponse
    {
        return $this->executeTyped($request, GetSmartupgradeResponse::class);
    }

    /**
     * List all smart upgrades with optional filters.
     *
     * @param ListSmartUpgradesRequest $request Request with optional filter criteria
     * @return ListSmartUpgradesResponse Response with list of smart upgrades
     */
    public function list(ListSmartUpgradesRequest $request): ListSmartUpgradesResponse
    {
        return $this->executeTyped($request, ListSmartUpgradesResponse::class);
    }
}
