<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * Product Group Data Transfer Object
 *
 * Data structure for product group creation and updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createProductGroup.yaml
 * @link https://digistore24.com/api/docs/paths/updateProductGroup.yaml
 */
final class ProductGroupData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * Product group name
     * Maximum 31 characters
     */
    public string $name {
        set {
            if (!Validator::isLength($value, null, 31)) {
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
}
