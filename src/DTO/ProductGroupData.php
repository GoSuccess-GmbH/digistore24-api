<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Product Group Data Transfer Object
 *
 * Data structure for product group creation and updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createProductGroup.yaml
 * @link https://digistore24.com/api/docs/paths/updateProductGroup.yaml
 */
final class ProductGroupData
{
    /**
     * Product group name
     * Maximum 31 characters
     */
    public string $name {
        set {
            if (strlen($value) > 31) {
                throw new \InvalidArgumentException('Product group name must not exceed 31 characters');
            }
            $this->name = $value;
        }
    }

    /**
     * The display order
     */
    public int $position = 10 {
        set {
            if ($value < 0) {
                throw new \InvalidArgumentException('Position must be positive');
            }
            $this->position = $value;
        }
    }

    /**
     * If true, the group is displayed as a tab in the product list
     */
    public bool $isShownAsTab = false;

    /**
     * Create ProductGroupData from array
     *
     * @param array{
     *     name: string,
     *     position?: int,
     *     is_shown_as_tab?: bool
     * } $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->name = $data['name'];
        $instance->position = $data['position'] ?? 10;
        $instance->isShownAsTab = $data['is_shown_as_tab'] ?? false;

        return $instance;
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'position' => $this->position,
            'is_shown_as_tab' => $this->isShownAsTab,
        ];
    }
}
