<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Payout\ListPayoutsRequest;
use GoSuccess\Digistore24\Api\Request\Payout\StatsExpectedPayoutsRequest;
use GoSuccess\Digistore24\Api\Response\Payout\ListPayoutsResponse;
use GoSuccess\Digistore24\Api\Response\Payout\StatsExpectedPayoutsResponse;

/**
 * Payout Resource
 *
 * Provides methods to retrieve payout information and statistics.
 */
final class PayoutResource extends AbstractResource
{
    /**
     * List all payouts with optional filters.
     *
     * @param ListPayoutsRequest|null $request Optional request with filter criteria
     * @return ListPayoutsResponse Response with list of payouts
     */
    public function list(?ListPayoutsRequest $request = null): ListPayoutsResponse
    {
        return $this->executeTyped($request ?? new ListPayoutsRequest(), ListPayoutsResponse::class);
    }

    /**
     * Get expected payout statistics.
     *
     * @param StatsExpectedPayoutsRequest|null $request Optional request for payout statistics
     * @return StatsExpectedPayoutsResponse Response with expected payout amounts
     */
    public function statsExpected(?StatsExpectedPayoutsRequest $request = null): StatsExpectedPayoutsResponse
    {
        return $this->executeTyped($request ?? new StatsExpectedPayoutsRequest(), StatsExpectedPayoutsResponse::class);
    }
}
