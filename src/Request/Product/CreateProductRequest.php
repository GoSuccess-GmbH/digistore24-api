<?php

declare(strict_types=1);

namespace Digistore24\Request\Product;

use Digistore24\Base\AbstractRequest;

/**
 * Request to create a new product
 *
 * @link https://digistore24.com/api/docs/paths/createProduct.yaml OpenAPI Specification
 */
final readonly class CreateProductRequest extends AbstractRequest
{
    /**
     * @param string $nameIntern Internal product name (max 63 chars)
     * @param string|null $nameDe German product name (max 63 chars)
     * @param string|null $nameEn English product name (max 63 chars)
     * @param string|null $nameEs Spanish product name (max 63 chars)
     * @param string|null $descriptionDe German description (filtered HTML)
     * @param string|null $descriptionEn English description (filtered HTML)
     * @param string|null $descriptionEs Spanish description (filtered HTML)
     * @param string|null $salespageUrl Sales page URL (max 255 chars)
     * @param string|null $upsellSalespageUrl Upsell sales page URL (max 255 chars)
     * @param string|null $thankyouUrl Thank you page URL (max 255 chars)
     * @param string|null $imageUrl Product image URL (max 255 chars)
     * @param int|null $productTypeId Product type ID (from getGlobalSettings)
     * @param string|null $approvalStatus Product approval status: 'new' or 'pending'
     * @param float|null $affiliateCommission Affiliate commission amount
     * @param string|null $buyerType 'consumer' (prices incl. VAT) or 'business' (prices excl. VAT)
     * @param string|null $isAddressInputMandatory 'Y' or 'N' - must buyer enter address
     * @param string|null $addOrderDataToThankyouPageUrl 'Y' or 'N' - add order data to thankyou URL
     */
    public function __construct(
        public string $nameIntern,
        public ?string $nameDe = null,
        public ?string $nameEn = null,
        public ?string $nameEs = null,
        public ?string $descriptionDe = null,
        public ?string $descriptionEn = null,
        public ?string $descriptionEs = null,
        public ?string $salespageUrl = null,
        public ?string $upsellSalespageUrl = null,
        public ?string $thankyouUrl = null,
        public ?string $imageUrl = null,
        public ?int $productTypeId = null,
        public ?string $approvalStatus = null,
        public ?float $affiliateCommission = null,
        public ?string $buyerType = null,
        public ?string $isAddressInputMandatory = null,
        public ?string $addOrderDataToThankyouPageUrl = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'name_intern' => $this->nameIntern,
        ];

        if ($this->nameDe !== null) {
            $data['name_de'] = $this->nameDe;
        }
        if ($this->nameEn !== null) {
            $data['name_en'] = $this->nameEn;
        }
        if ($this->nameEs !== null) {
            $data['name_es'] = $this->nameEs;
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
        if ($this->approvalStatus !== null) {
            $data['approval_status'] = $this->approvalStatus;
        }
        if ($this->affiliateCommission !== null) {
            $data['affiliate_commission'] = $this->affiliateCommission;
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

        return ['data' => $data];
    }

    public function validate(): void
    {
        // nameIntern is required and validated by readonly property
        if (strlen($this->nameIntern) > 63) {
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

        if ($this->isAddressInputMandatory !== null && !in_array($this->isAddressInputMandatory, ['Y', 'N'], true)) {
            throw new \InvalidArgumentException('isAddressInputMandatory must be either "Y" or "N"');
        }

        if ($this->addOrderDataToThankyouPageUrl !== null && !in_array($this->addOrderDataToThankyouPageUrl, ['Y', 'N'], true)) {
            throw new \InvalidArgumentException('addOrderDataToThankyouPageUrl must be either "Y" or "N"');
        }
    }
}
