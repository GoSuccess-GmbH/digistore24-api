<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Util\ArrayHelper;
use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * Tracking Data Transfer Object
 *
 * Represents tracking information for purchase events.
 * Uses PHP 8.4 property hooks for automatic validation.
 */
final class TrackingData extends AbstractDataTransferObject
{
    /**
     * Thank you page URL
     */
    public ?string $thankyou_url = null {
        set {
            if ($value !== null && ! Validator::isUrl($value)) {
                throw new \InvalidArgumentException('Thank you URL must be a valid URL');
            }
            $this->thankyou_url = $value;
        }
    }

    /**
     * Cancellation URL
     */
    public ?string $cancellation_url = null {
        set {
            if ($value !== null && ! Validator::isUrl($value)) {
                throw new \InvalidArgumentException('Cancellation URL must be a valid URL');
            }
            $this->cancellation_url = $value;
        }
    }

    /**
     * Billing failure URL
     */
    public ?string $billing_failure_url = null {
        set {
            if ($value !== null && ! Validator::isUrl($value)) {
                throw new \InvalidArgumentException('Billing failure URL must be a valid URL');
            }
            $this->billing_failure_url = $value;
        }
    }

    /**
     * Google Analytics Tracking ID
     */
    public ?string $ga_tid = null {
        set {
            if ($value !== null && ! preg_match('/^(UA|G|GT|AW)-/', $value)) {
                throw new \InvalidArgumentException('Google Analytics Tracking ID must start with UA-, G-, GT-, or AW-');
            }
            $this->ga_tid = $value;
        }
    }

    /**
     * Facebook Pixel ID
     */
    public ?string $fb_pixel_id = null {
        set {
            if ($value !== null && ! preg_match('/^\d+$/', $value)) {
                throw new \InvalidArgumentException('Facebook Pixel ID must be numeric');
            }
            $this->fb_pixel_id = $value;
        }
    }

    /**
     * Custom tracking value
     */
    public ?string $custom = null;

    /**
     * Affiliate partner identifier
     */
    public ?string $affiliate = null;

    /**
     * Affiliate priority level
     */
    public ?string $affiliatePriority = null;

    /**
     * Campaign key for tracking
     */
    public ?string $campaignkey = null;

    /**
     * Tracking key identifier
     */
    public ?string $trackingkey = null;

    /**
     * UTM Source parameter
     */
    public ?string $utmSource = null;

    /**
     * UTM Medium parameter
     */
    public ?string $utmMedium = null;

    /**
     * UTM Campaign parameter
     */
    public ?string $utmCampaign = null;

    /**
     * UTM Term parameter
     */
    public ?string $utmTerm = null;

    /**
     * UTM Content parameter
     */
    public ?string $utmContent = null;

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];

        foreach (get_object_vars($this) as $property => $value) {
            if ($value !== null) {
                $data[$property] = $value;
            }
        }

        /** @var array<string, mixed> */
        return ArrayHelper::keysToSnakeCase($data);
    }
}
