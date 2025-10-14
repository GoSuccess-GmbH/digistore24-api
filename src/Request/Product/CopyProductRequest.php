<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Product;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Request to copy an existing product
 *
 * @link https://digistore24.com/api/docs/paths/copyProduct.yaml OpenAPI Specification
 */
final readonly class CopyProductRequest extends AbstractRequest
{
    /**
     * @param int $productId The ID of the product to be copied
     * @param string|null $nameIntern Internal product name (max 63 chars)
     * @param int|null $productTypeId Product type ID (from getGlobalSettings)
     * @param string|null $language Comma separated list of languages (e.g. "en,de")
     * @param string|null $isActive Product activation status: 'Y' or 'N'
     * @param int|null $productGroupId Product group ID
     * @param string|null $nameDe German product name (max 63 chars)
     * @param string|null $nameEn English product name (max 63 chars)
     * @param string|null $nameEs Spanish product name (max 63 chars)
     */
    public function __construct(
        public int $productId,
        public ?string $nameIntern = null,
        public ?int $productTypeId = null,
        public ?string $language = null,
        public ?string $isActive = null,
        public ?int $productGroupId = null,
        public ?string $nameDe = null,
        public ?string $nameEn = null,
        public ?string $nameEs = null,
    ) {
    }

    public function toArray(): array
    {
        $params = [
            'product_id' => (string)$this->productId,
        ];

        $data = [];

        if ($this->nameIntern !== null) {
            $data['name_intern'] = $this->nameIntern;
        }
        if ($this->productTypeId !== null) {
            $data['product_type_id'] = $this->productTypeId;
        }
        if ($this->language !== null) {
            $data['language'] = $this->language;
        }
        if ($this->isActive !== null) {
            $data['is_active'] = $this->isActive;
        }
        if ($this->productGroupId !== null) {
            $data['product_group_id'] = $this->productGroupId;
        }
        if ($this->nameDe !== null) {
            $data['name_de'] = $this->nameDe;
        }
        if ($this->nameEn !== null) {
            $data['name_en'] = $this->nameEn;
        }
        if ($this->nameEs !== null) {
            $data['name_es'] = $this->nameEs;
        }

        if (!empty($data)) {
            $params['data'] = $data;
        }

        return $params;
    }

    public function validate(): void
    {
        if ($this->nameIntern !== null && strlen($this->nameIntern) > 63) {
            throw new \InvalidArgumentException('nameIntern must not exceed 63 characters');
        }

        if ($this->nameDe !== null && strlen($this->nameDe) > 63) {
            throw new \InvalidArgumentException('nameDe must not exceed 63 characters');
        }

        if ($this->nameEn !== null && strlen($this->nameEn) > 63) {
            throw new \InvalidArgumentException('nameEn must not exceed 63 characters');
        }

        if ($this->nameEs !== null && strlen($this->nameEs) > 63) {
            throw new \InvalidArgumentException('nameEs must not exceed 63 characters');
        }

        if ($this->isActive !== null && !in_array($this->isActive, ['Y', 'N'], true)) {
            throw new \InvalidArgumentException('isActive must be either "Y" or "N"');
        }
    }
}
