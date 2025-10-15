<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Statistics\StatsAffiliateToplistRequest;
use GoSuccess\Digistore24\Api\Request\Statistics\StatsDailyAmountsRequest;
use GoSuccess\Digistore24\Api\Request\Statistics\StatsSalesRequest;
use GoSuccess\Digistore24\Api\Request\Statistics\StatsSalesSummaryRequest;
use GoSuccess\Digistore24\Api\Response\Statistics\StatsAffiliateToplistResponse;
use GoSuccess\Digistore24\Api\Response\Statistics\StatsDailyAmountsResponse;
use GoSuccess\Digistore24\Api\Response\Statistics\StatsSalesResponse;
use GoSuccess\Digistore24\Api\Response\Statistics\StatsSalesSummaryResponse;

/**
 * Statistics Resource
 *
 * Provides methods to retrieve sales statistics and affiliate performance data.
 */
final class StatisticsResource extends AbstractResource
{
    /**
     * Get affiliate toplist statistics.
     *
     * @param StatsAffiliateToplistRequest $request Request with filter criteria
     * @return StatsAffiliateToplistResponse Response with top affiliates
     */
    public function affiliateToplist(StatsAffiliateToplistRequest $request): StatsAffiliateToplistResponse
    {
        return $this->executeTyped($request, StatsAffiliateToplistResponse::class);
    }

    /**
     * Get daily sales amounts.
     *
     * @param StatsDailyAmountsRequest $request Request with date range
     * @return StatsDailyAmountsResponse Response with daily revenue data
     */
    public function dailyAmounts(StatsDailyAmountsRequest $request): StatsDailyAmountsResponse
    {
        return $this->executeTyped($request, StatsDailyAmountsResponse::class);
    }

    /**
     * Get detailed sales statistics.
     *
     * @param StatsSalesRequest $request Request with filter criteria
     * @return StatsSalesResponse Response with sales details
     */
    public function sales(StatsSalesRequest $request): StatsSalesResponse
    {
        return $this->executeTyped($request, StatsSalesResponse::class);
    }

    /**
     * Get sales summary statistics.
     *
     * @param StatsSalesSummaryRequest $request Request with filter criteria
     * @return StatsSalesSummaryResponse Response with aggregated sales data
     */
    public function salesSummary(StatsSalesSummaryRequest $request): StatsSalesSummaryResponse
    {
        return $this->executeTyped($request, StatsSalesSummaryResponse::class);
    }
}
