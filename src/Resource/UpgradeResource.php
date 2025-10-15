<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Upgrade\GetUpgradeRequest;
use GoSuccess\Digistore24\Api\Request\Upgrade\CreateUpgradeRequest;
use GoSuccess\Digistore24\Api\Request\Upgrade\DeleteUpgradeRequest;
use GoSuccess\Digistore24\Api\Request\Upgrade\ListUpgradesRequest;
use GoSuccess\Digistore24\Api\Response\Upgrade\GetUpgradeResponse;
use GoSuccess\Digistore24\Api\Response\Upgrade\CreateUpgradeResponse;
use GoSuccess\Digistore24\Api\Response\Upgrade\DeleteUpgradeResponse;
use GoSuccess\Digistore24\Api\Response\Upgrade\ListUpgradesResponse;

/**
 * Upgrade Resource
 *
 * Provides methods to manage product upgrades for existing purchases.
 */
final class UpgradeResource extends AbstractResource
{
    /**
     * Get upgrade details by ID.
     *
     * @param GetUpgradeRequest $request Request containing upgrade ID
     * @return GetUpgradeResponse Response with upgrade details
     */
    public function get(GetUpgradeRequest $request): GetUpgradeResponse
    {
        return $this->executeTyped($request, GetUpgradeResponse::class);
    }

    /**
     * Create a new product upgrade.
     *
     * @param CreateUpgradeRequest $request Request with upgrade configuration
     * @return CreateUpgradeResponse Response with created upgrade ID
     */
    public function create(CreateUpgradeRequest $request): CreateUpgradeResponse
    {
        return $this->executeTyped($request, CreateUpgradeResponse::class);
    }

    /**
     * Delete an upgrade.
     *
     * @param DeleteUpgradeRequest $request Request containing upgrade ID
     * @return DeleteUpgradeResponse Response confirming deletion
     */
    public function delete(DeleteUpgradeRequest $request): DeleteUpgradeResponse
    {
        return $this->executeTyped($request, DeleteUpgradeResponse::class);
    }

    /**
     * List all upgrades with optional filters.
     *
     * @param ListUpgradesRequest $request Request with optional filter criteria
     * @return ListUpgradesResponse Response with list of upgrades
     */
    public function list(ListUpgradesRequest $request): ListUpgradesResponse
    {
        return $this->executeTyped($request, ListUpgradesResponse::class);
    }
}
