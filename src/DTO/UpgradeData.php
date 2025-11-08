<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject;
use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * Upgrade Data Transfer Object
 *
 * Data structure for upgrade creation.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createUpgrade.yaml
 */
final class UpgradeData extends AbstractDataTransferObject
{
    /**
     * Name of the new upgrade
     */
    public string $name {
        set {
            if (! Validator::isLength($value, null, 255)) {
                throw new \InvalidArgumentException('Name must not exceed 255 characters');
            }
            $this->name = $value;
        }
    }

    /**
     * The product ID being sold as the upgrade
     */
    public int $toProductId {
        set {
            if ($value < 1) {
                throw new \InvalidArgumentException('Product ID must be positive');
            }
            $this->toProductId = $value;
        }
    }

    /**
     * Comma-separated list of product IDs that can be upgraded from
     * Changes take effect immediately
     */
    public string $upgradeFrom = '';

    /**
     * Comma-separated list of product IDs that can be downgraded from
     * Changes take effect next billing period
     */
    public string $downgradeFrom = '';

    /**
     * Comma-separated list of product IDs eligible for special member offers
     */
    public string $specialOfferFor = '';

    /**
     * Product ID to offer if upgrade is not possible
     */
    public ?int $fallbackProductId = null {
        set {
            if ($value !== null && $value < 1) {
                throw new \InvalidArgumentException('Fallback product ID must be positive');
            }
            $this->fallbackProductId = $value;
        }
    }

    /**
     * Whether the upgrade is active and purchasable
     */
    public bool $isActive = true;

    /**
     * Determines which buyer data fields are protected
     *
     * - none: All fields editable
     * - email: Only email protected
     * - email_and_name: Email and name protected
     * - all: All fields protected
     */
    public string $buyerReadonlyKeys = 'none' {
        set {
            if (! in_array($value, ['none', 'email', 'email_and_name', 'all'], true)) {
                throw new \InvalidArgumentException("Invalid buyer readonly keys: {$value}. Allowed: none, email, email_and_name, all");
            }
            $this->buyerReadonlyKeys = $value;
        }
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = ['name' => $this->name, 'to_product_id' => $this->toProductId, 'upgrade_from' => $this->upgradeFrom, 'downgrade_from' => $this->downgradeFrom, 'special_offer_for' => $this->specialOfferFor, 'is_active' => $this->isActive ? 'Y' : 'N', 'buyer_readonly_keys' => $this->buyerReadonlyKeys];
        if ($this->fallbackProductId !== null) {
            $data['fallback_product_id'] = $this->fallbackProductId;
        }

        return $data;
    }
}
