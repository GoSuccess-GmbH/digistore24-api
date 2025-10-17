<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * URLs Data Transfer Object
 *
 * Data structure for custom URLs used in Buy URL creation.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createBuyUrl.yaml
 */
final class UrlsData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * Custom thank you page URL
     *
     * URL where the buyer is redirected after successful purchase.
     */
    public ?string $thankyouUrl = null {
        set {
            if ($value !== null && ! Validator::isUrl($value)) {
                throw new \InvalidArgumentException('Thank you URL must be a valid URL');
            }
            $this->thankyouUrl = $value;
        }
    }

    /**
     * URL for invalid links
     *
     * URL where the buyer is redirected if the buy link is invalid or expired.
     */
    public ?string $fallbackUrl = null {
        set {
            if ($value !== null && ! Validator::isUrl($value)) {
                throw new \InvalidArgumentException('Fallback URL must be a valid URL');
            }
            $this->fallbackUrl = $value;
        }
    }

    /**
     * URL for failed upgrades
     *
     * URL where the buyer is redirected if an upgrade purchase fails.
     */
    public ?string $upgradeErrorUrl = null {
        set {
            if ($value !== null && ! Validator::isUrl($value)) {
                throw new \InvalidArgumentException('Upgrade error URL must be a valid URL');
            }
            $this->upgradeErrorUrl = $value;
        }
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $data = [];
        if ($this->thankyouUrl !== null) {
            $data['thankyou_url'] = $this->thankyouUrl;
        }
        if ($this->fallbackUrl !== null) {
            $data['fallback_url'] = $this->fallbackUrl;
        }
        if ($this->upgradeErrorUrl !== null) {
            $data['upgrade_error_url'] = $this->upgradeErrorUrl;
        }

        return $data;
    }
}
