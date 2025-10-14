<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Upgrade\GetUpgradeRequest;
use GoSuccess\Digistore24\Request\Upgrade\CreateUpgradeRequest;
use GoSuccess\Digistore24\Request\Upgrade\DeleteUpgradeRequest;
use GoSuccess\Digistore24\Request\Upgrade\ListUpgradesRequest;
use GoSuccess\Digistore24\Response\Upgrade\GetUpgradeResponse;
use GoSuccess\Digistore24\Response\Upgrade\CreateUpgradeResponse;
use GoSuccess\Digistore24\Response\Upgrade\DeleteUpgradeResponse;
use GoSuccess\Digistore24\Response\Upgrade\ListUpgradesResponse;
final class UpgradeResource extends AbstractResource
{
    public function get(GetUpgradeRequest $request): GetUpgradeResponse
    {
        return $this->executeTyped($request, GetUpgradeResponse::class);
    }
    public function create(CreateUpgradeRequest $request): CreateUpgradeResponse
    {
        return $this->executeTyped($request, CreateUpgradeResponse::class);
    }
    public function delete(DeleteUpgradeRequest $request): DeleteUpgradeResponse
    {
        return $this->executeTyped($request, DeleteUpgradeResponse::class);
    }
    public function list(ListUpgradesRequest $request): ListUpgradesResponse
    {
        return $this->executeTyped($request, ListUpgradesResponse::class);
    }
}
