<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

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
        /** @var array<string, string> $data */
        $data = [];

        foreach (get_object_vars($this) as $property => $value) {
            if ($value !== null && is_string($value)) {
                // Convert camelCase to snake_case for API
                $key = preg_replace('/([a-z])([A-Z])/', '$1_$2', $property);
                if ($key !== null) {
                    $key = strtolower($key);
                    $data[$key] = $value;
                }
            }
        }

        return $data;
    }
}
