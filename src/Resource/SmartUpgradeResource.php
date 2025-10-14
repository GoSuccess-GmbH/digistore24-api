<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\SmartUpgrade\GetSmartupgradeRequest;
use GoSuccess\Digistore24\Api\Request\SmartUpgrade\ListSmartUpgradesRequest;
use GoSuccess\Digistore24\Api\Response\SmartUpgrade\GetSmartupgradeResponse;
use GoSuccess\Digistore24\Api\Response\SmartUpgrade\ListSmartUpgradesResponse;
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
