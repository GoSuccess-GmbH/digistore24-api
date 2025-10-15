<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DataTransferObject;

/**
 * Tracking Data Transfer Object
 *
 * Represents tracking information for API requests and responses.
 * All fields are optional strings - no validation needed.
 */
final class TrackingData
{
    public ?string $custom = null;

    public ?string $affiliate = null;

    public ?string $affiliatePriority = null;

    public ?string $campaignkey = null;

    public ?string $trackingkey = null;

    public ?string $utmSource = null;

    public ?string $utmMedium = null;

    public ?string $utmCampaign = null;

    public ?string $utmTerm = null;

    public ?string $utmContent = null;

    /**
     * Convert to array for API request
     *
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $data = [];

        foreach (get_object_vars($this) as $property => $value) {
            if ($value !== null) {
                // Convert camelCase to snake_case for API
                $key = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $property));
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
