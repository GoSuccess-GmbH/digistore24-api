<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Payout\ListPayoutsRequest;
use GoSuccess\Digistore24\Api\Request\Payout\StatsExpectedPayoutsRequest;
use GoSuccess\Digistore24\Api\Response\Payout\ListPayoutsResponse;
use GoSuccess\Digistore24\Api\Response\Payout\StatsExpectedPayoutsResponse;
final class PayoutResource extends AbstractResource
{
    public function list(ListPayoutsRequest $request): ListPayoutsResponse
    {
        return $this->executeTyped($request, ListPayoutsResponse::class);
    }
    public function statsExpected(StatsExpectedPayoutsRequest $request): StatsExpectedPayoutsResponse
    {
        return $this->executeTyped($request, StatsExpectedPayoutsResponse::class);
    }
}
