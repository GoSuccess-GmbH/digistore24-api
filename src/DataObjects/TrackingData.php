<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\DataObjects;

/**
 * Tracking Data
 * 
 * Immutable data object for tracking information.
 */
readonly class TrackingData
{
    public ?string $custom;
    public ?string $affiliate;
    public ?string $affiliatePriority;
    public ?string $campaignkey;
    public ?string $trackingkey;
    public ?string $utmSource;
    public ?string $utmMedium;
    public ?string $utmCampaign;
    public ?string $utmTerm;
    public ?string $utmContent;

    public function __construct(
        ?string $custom = null,
        ?string $affiliate = null,
        ?string $affiliatePriority = null,
        ?string $campaignkey = null,
        ?string $trackingkey = null,
        ?string $utmSource = null,
        ?string $utmMedium = null,
        ?string $utmCampaign = null,
        ?string $utmTerm = null,
        ?string $utmContent = null,
    ) {
        $this->custom = $custom;
        $this->affiliate = $affiliate;
        $this->affiliatePriority = $affiliatePriority;
        $this->campaignkey = $campaignkey;
        $this->trackingkey = $trackingkey;
        $this->utmSource = $utmSource;
        $this->utmMedium = $utmMedium;
        $this->utmCampaign = $utmCampaign;
        $this->utmTerm = $utmTerm;
        $this->utmContent = $utmContent;
    }
}
