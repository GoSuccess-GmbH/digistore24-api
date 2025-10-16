<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Upgrade Data Transfer Object
 *
 * Data structure for upgrade creation.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createUpgrade.yaml
 */
final class UpgradeData
{
    /**
     * Name of the new upgrade
     */
    public string $name;

    /**
     * The product ID being sold as the upgrade
     */
    public int $toProductId;

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
    public ?int $fallbackProductId = null;

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
                throw new \InvalidArgumentException(
                    "Invalid buyer readonly keys: $value. Allowed: none, email, email_and_name, all",
                );
            }
            $this->buyerReadonlyKeys = $value;
        }
    }

    /**
     * Create UpgradeData from array
     *
     * @param array{
     *     name: string,
     *     to_product_id: int,
     *     upgrade_from?: string,
     *     downgrade_from?: string,
     *     special_offer_for?: string,
     *     fallback_product_id?: int|null,
     *     is_active?: bool|string,
     *     buyer_readonly_keys?: string
     * } $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->name = $data['name'];
        $instance->toProductId = $data['to_product_id'];
        $instance->upgradeFrom = $data['upgrade_from'] ?? '';
        $instance->downgradeFrom = $data['downgrade_from'] ?? '';
        $instance->specialOfferFor = $data['special_offer_for'] ?? '';
        $instance->fallbackProductId = $data['fallback_product_id'] ?? null;

        // Handle Digistore24's Y/N format
        if (isset($data['is_active'])) {
            $instance->isActive = is_bool($data['is_active'])
                ? $data['is_active']
                : ($data['is_active'] === 'Y');
        }

        $instance->buyerReadonlyKeys = $data['buyer_readonly_keys'] ?? 'none';

        return $instance;
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'to_product_id' => $this->toProductId,
            'upgrade_from' => $this->upgradeFrom,
            'downgrade_from' => $this->downgradeFrom,
            'special_offer_for' => $this->specialOfferFor,
            'is_active' => $this->isActive ? 'Y' : 'N',
            'buyer_readonly_keys' => $this->buyerReadonlyKeys,
        ];

        if ($this->fallbackProductId !== null) {
            $data['fallback_product_id'] = $this->fallbackProductId;
        }

        return $data;
    }
}
