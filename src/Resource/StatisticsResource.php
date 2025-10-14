<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Statistics\StatsAffiliateToplistRequest;
use GoSuccess\Digistore24\Request\Statistics\StatsDailyAmountsRequest;
use GoSuccess\Digistore24\Request\Statistics\StatsSalesRequest;
use GoSuccess\Digistore24\Request\Statistics\StatsSalesSummaryRequest;
use GoSuccess\Digistore24\Response\Statistics\StatsAffiliateToplistResponse;
use GoSuccess\Digistore24\Response\Statistics\StatsDailyAmountsResponse;
use GoSuccess\Digistore24\Response\Statistics\StatsSalesResponse;
use GoSuccess\Digistore24\Response\Statistics\StatsSalesSummaryResponse;
final class StatisticsResource extends AbstractResource
{
    public function affiliateToplist(StatsAffiliateToplistRequest $request): StatsAffiliateToplistResponse
    {
        return $this->executeTyped($request, StatsAffiliateToplistResponse::class);
    }
    public function dailyAmounts(StatsDailyAmountsRequest $request): StatsDailyAmountsResponse
    {
        return $this->executeTyped($request, StatsDailyAmountsResponse::class);
    }
    public function sales(StatsSalesRequest $request): StatsSalesResponse
    {
        return $this->executeTyped($request, StatsSalesResponse::class);
    }
    public function salesSummary(StatsSalesSummaryRequest $request): StatsSalesSummaryResponse
    {
        return $this->executeTyped($request, StatsSalesSummaryResponse::class);
    }
}
