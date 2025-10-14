<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\AddonData;
use GoSuccess\Digistore24\Api\DataTransferObject\PlaceholderData;
use GoSuccess\Digistore24\Api\DataTransferObject\TrackingData;

/**
 * Create Addon Change Purchase Request
 * 
 * Creates a package change order to add or remove products from an order.
 * The main product's quantity cannot be changed. Added products must be subscriptions.
 * Requires "Billing on demand" right to be enabled for the vendor account.
 */
final class CreateAddonChangePurchaseRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The reference order (must support rebilling)
     * @param array<AddonData> $addons List of add-on products
     * @param TrackingData|null $tracking Tracking data (fields not provided are taken from initial purchase)
     * @param PlaceholderData|null $placeholders Placeholders for product title and description
     */
    public function __construct(
        public string $purchaseId,
        public array $addons,
        public ?TrackingData $tracking = null,
        public ?PlaceholderData $placeholders = null,
    ) {
        if (empty($addons)) {
            throw new \InvalidArgumentException('At least one addon is required');
        }

        foreach ($addons as $addon) {
            if (!$addon instanceof AddonData) {
                throw new \InvalidArgumentException('All addons must be instances of AddonData');
            }
        }
    }

    public function endpoint(): string
    {
        return 'createAddonChangePurchase';
    }

    public function toArray(): array
    {
        $data = [
            'purchase_id' => $this->purchaseId,
            'addons' => array_map(fn(AddonData $addon): array => $addon->toArray(), $this->addons),
        ];

        if ($this->tracking !== null) {
            $data['tracking'] = $this->tracking->toArray();
        }

        if ($this->placeholders !== null) {
            $data['placeholders'] = $this->placeholders->toArray();
        }

        return $data;
    }

    protected function rules(): array
    {
        return [
            'purchase_id' => 'required',
        ];
    }
}
