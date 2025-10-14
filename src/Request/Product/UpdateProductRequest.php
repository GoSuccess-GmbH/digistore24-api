<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Product;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Request to update an existing product
 *
 * @link https://digistore24.com/api/docs/paths/updateProduct.yaml OpenAPI Specification
 */
final readonly class UpdateProductRequest extends AbstractRequest
{
    /**
     * @param int $productId The Digistore24 product ID
     * @param string|null $nameDe Product name in German (max 63 chars)
     * @param string|null $nameEn Product name in English (max 63 chars)
     * @param string|null $nameEs Product name in Spanish (max 63 chars)
     * @param string|null $nameIntern Internal product name (max 63 chars)
     * @param string|null $descriptionDe Product description in German (filtered HTML)
     * @param string|null $descriptionEn Product description in English (filtered HTML)
     * @param string|null $descriptionEs Product description in Spanish (filtered HTML)
     * @param string|null $salespageUrl URL of the sales page (max 255 chars)
     * @param string|null $upsellSalespageUrl URL of the upsell sales page (max 255 chars)
     * @param string|null $thankyouUrl URL of the thank you page (max 255 chars)
     * @param string|null $imageUrl URL of the product image (max 255 chars)
     * @param int|null $productTypeId Product type ID (from getGlobalSettings)
     * @param string|null $currency List of possible currencies (e.g., "USD,EUR")
     * @param string|null $approvalStatus Approval status: 'new' or 'pending'
     * @param float|null $affiliateCommission Commission for affiliates
     * @param string|null $buyerType 'consumer' (prices incl. VAT) or 'business' (prices excl. VAT)
     * @param bool|null $isAddressInputMandatory True if buyer must always enter address
     * @param bool|null $addOrderDataToThankyouPageUrl True if order data is added to thankyou URL
     */
    public function __construct(
        public int $productId,
        public ?string $nameDe = null,
        public ?string $nameEn = null,
        public ?string $nameEs = null,
        public ?string $nameIntern = null,
        public ?string $descriptionDe = null,
        public ?string $descriptionEn = null,
        public ?string $descriptionEs = null,
        public ?string $salespageUrl = null,
        public ?string $upsellSalespageUrl = null,
        public ?string $thankyouUrl = null,
        public ?string $imageUrl = null,
        public ?int $productTypeId = null,
        public ?string $currency = null,
        public ?string $approvalStatus = null,
        public ?float $affiliateCommission = null,
        public ?string $buyerType = null,
        public ?bool $isAddressInputMandatory = null,
        public ?bool $addOrderDataToThankyouPageUrl = null,
    ) {
    }

    public function toArray(): array
    {
        $params = [
            'product_id' => $this->productId,
        ];

        $data = [];

        if ($this->nameDe !== null) {
            $data['name_de'] = $this->nameDe;
        }
        if ($this->nameEn !== null) {
            $data['name_en'] = $this->nameEn;
        }
        if ($this->nameEs !== null) {
            $data['name_es'] = $this->nameEs;
        }
        if ($this->nameIntern !== null) {
            $data['name_intern'] = $this->nameIntern;
        }
        if ($this->descriptionDe !== null) {
            $data['description_de'] = $this->descriptionDe;
        }
        if ($this->descriptionEn !== null) {
            $data['description_en'] = $this->descriptionEn;
        }
        if ($this->descriptionEs !== null) {
            $data['description_es'] = $this->descriptionEs;
        }
        if ($this->salespageUrl !== null) {
            $data['salespage_url'] = $this->salespageUrl;
        }
        if ($this->upsellSalespageUrl !== null) {
            $data['upsell_salespage_url'] = $this->upsellSalespageUrl;
        }
        if ($this->thankyouUrl !== null) {
            $data['thankyou_url'] = $this->thankyouUrl;
        }
        if ($this->imageUrl !== null) {
            $data['image_url'] = $this->imageUrl;
        }
        if ($this->productTypeId !== null) {
            $data['product_type_id'] = $this->productTypeId;
        }
        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }
        if ($this->approvalStatus !== null) {
            $data['approval_status'] = $this->approvalStatus;
        }
        if ($this->affiliateCommission !== null) {
            $data['affiliate_commision'] = $this->affiliateCommission; // Note: API uses 'commision' (typo)
        }
        if ($this->buyerType !== null) {
            $data['buyer_type'] = $this->buyerType;
        }
        if ($this->isAddressInputMandatory !== null) {
            $data['is_address_input_mandatory'] = $this->isAddressInputMandatory;
        }
        if ($this->addOrderDataToThankyouPageUrl !== null) {
            $data['add_order_data_to_thankyou_page_url'] = $this->addOrderDataToThankyouPageUrl;
        }

        // Only add data to params if there's something to update
        if (!empty($data)) {
            $params = array_merge($params, $data);
        }

        return $params;
    }

    public function validate(): void
    {
        if ($this->nameDe !== null && strlen($this->nameDe) > 63) {
            throw new \InvalidArgumentException('nameDe must not exceed 63 characters');
        }

        if ($this->nameEn !== null && strlen($this->nameEn) > 63) {
            throw new \InvalidArgumentException('nameEn must not exceed 63 characters');
        }

        if ($this->nameEs !== null && strlen($this->nameEs) > 63) {
            throw new \InvalidArgumentException('nameEs must not exceed 63 characters');
        }

        if ($this->nameIntern !== null && strlen($this->nameIntern) > 63) {
            throw new \InvalidArgumentException('nameIntern must not exceed 63 characters');
        }

        if ($this->salespageUrl !== null && strlen($this->salespageUrl) > 255) {
            throw new \InvalidArgumentException('salespageUrl must not exceed 255 characters');
        }

        if ($this->upsellSalespageUrl !== null && strlen($this->upsellSalespageUrl) > 255) {
            throw new \InvalidArgumentException('upsellSalespageUrl must not exceed 255 characters');
        }

        if ($this->thankyouUrl !== null && strlen($this->thankyouUrl) > 255) {
            throw new \InvalidArgumentException('thankyouUrl must not exceed 255 characters');
        }

        if ($this->imageUrl !== null && strlen($this->imageUrl) > 255) {
            throw new \InvalidArgumentException('imageUrl must not exceed 255 characters');
        }

        if ($this->approvalStatus !== null && !in_array($this->approvalStatus, ['new', 'pending'], true)) {
            throw new \InvalidArgumentException('approvalStatus must be either "new" or "pending"');
        }

        if ($this->buyerType !== null && !in_array($this->buyerType, ['consumer', 'business'], true)) {
            throw new \InvalidArgumentException('buyerType must be either "consumer" or "business"');
        }
    }
}
