<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * Tracking data for a purchase
 */
final readonly class TrackingData
{
    /**
     * @param array<string, string> $utmParams UTM parameters (source, medium, campaign, term, content)
     * @param string|null $clickId Click tracking ID
     * @param string[] $subIds Subscription IDs
     * @param string|null $vendorKey Vendor tracking key
     * @param string|null $campaignKey Campaign tracking key
     */
    public function __construct(
        public array $utmParams,
        public ?string $clickId = null,
        public array $subIds = [],
        public ?string $vendorKey = null,
        public ?string $campaignKey = null,
    ) {
    }
}

/**
 * Response from getting purchase tracking details
 *
 * @link https://digistore24.com/api/docs/paths/getPurchaseTracking.yaml OpenAPI Specification
 */
final readonly class GetPurchaseTrackingResponse extends AbstractResponse
{
    /** @var array<string, TrackingData> Tracking data indexed by purchase ID */
    public array $tracking;

    protected function parse(array $data): void
    {
        $tracking = [];

        // Handle single purchase response (data object)
        if (isset($data['data'])) {
            $trackingData = $this->parseTrackingData($data['data']);
            // Extract purchase ID from the response or use first key
            $purchaseId = array_key_first($data) ?? 'single';
            $tracking[$purchaseId] = $trackingData;
        } else {
            // Handle multiple purchases (object with purchase IDs as keys)
            foreach ($data as $purchaseId => $purchaseData) {
                if (isset($purchaseData['data'])) {
                    $tracking[$purchaseId] = $this->parseTrackingData($purchaseData['data']);
                }
            }
        }

        $this->tracking = $tracking;
    }

    private function parseTrackingData(array $data): TrackingData
    {
        $utmParams = [];
        if (isset($data['utm_params'])) {
            $utmParams = [
                'utm_source' => $data['utm_params']['utm_source'] ?? '',
                'utm_medium' => $data['utm_params']['utm_medium'] ?? '',
                'utm_campaign' => $data['utm_params']['utm_campaign'] ?? '',
                'utm_term' => $data['utm_params']['utm_term'] ?? '',
                'utm_content' => $data['utm_params']['utm_content'] ?? '',
            ];
        }

        return new TrackingData(
            utmParams: $utmParams,
            clickId: $data['click_id'] ?? null,
            subIds: $data['sub_ids'] ?? [],
            vendorKey: $data['vendor_key'] ?? null,
            campaignKey: $data['campaign_key'] ?? null,
        );
    }
}
