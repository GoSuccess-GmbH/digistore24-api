<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Payout\ListPayoutsRequest;
use GoSuccess\Digistore24\Request\Payout\StatsExpectedPayoutsRequest;
use GoSuccess\Digistore24\Response\Payout\ListPayoutsResponse;
use GoSuccess\Digistore24\Response\Payout\StatsExpectedPayoutsResponse;
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
