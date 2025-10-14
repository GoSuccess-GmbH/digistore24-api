<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\SmartUpgrade\GetSmartupgradeRequest;
use GoSuccess\Digistore24\Request\SmartUpgrade\ListSmartUpgradesRequest;
use GoSuccess\Digistore24\Response\SmartUpgrade\GetSmartupgradeResponse;
use GoSuccess\Digistore24\Response\SmartUpgrade\ListSmartUpgradesResponse;
final class SmartUpgradeResource extends AbstractResource
{
    public function get(GetSmartupgradeRequest $request): GetSmartupgradeResponse
    {
        return $this->executeTyped($request, GetSmartupgradeResponse::class);
    }
    public function list(ListSmartUpgradesRequest $request): ListSmartUpgradesResponse
    {
        return $this->executeTyped($request, ListSmartUpgradesResponse::class);
    }
}
