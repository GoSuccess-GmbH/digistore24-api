<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Product;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Request to copy an existing product
 *
 * @link https://digistore24.com/api/docs/paths/copyProduct.yaml OpenAPI Specification
 */
final class CopyProductRequest extends AbstractRequest
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
        $data = [
            'product_id' => (string)$this->productId,
        ];

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

        return $data;
    }

    public function getEndpoint(): string
    {
        return 'copyProduct';
    }
}