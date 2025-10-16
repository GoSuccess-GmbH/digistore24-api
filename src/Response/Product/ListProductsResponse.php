<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Product List Item
 *
 * Represents a product with ALL properties from Digistore24 API using Property Hooks (PHP 8.4)
 */
final class ProductListItem
{
    // Basic Information
    public string $id { get => (string)($this->data['id'] ?? ''); }
    public string $name { get => $this->data['name'] ?? ''; }
    public string $nameIntern { get => $this->data['name_intern'] ?? ''; }

    // Name - Language Variants
    public string $nameDe { get => $this->data['name_de'] ?? ''; }
    public string $nameEn { get => $this->data['name_en'] ?? ''; }
    public string $nameFr { get => $this->data['name_fr'] ?? ''; }
    public string $nameEs { get => $this->data['name_es'] ?? ''; }
    public string $nameNl { get => $this->data['name_nl'] ?? ''; }
    public string $nameIt { get => $this->data['name_it'] ?? ''; }
    public string $namePt { get => $this->data['name_pt'] ?? ''; }
    public string $namePl { get => $this->data['name_pl'] ?? ''; }
    public string $nameSl { get => $this->data['name_sl'] ?? ''; }

    // Description
    public string $description { get => $this->data['description'] ?? ''; }
    public string $descriptionDe { get => $this->data['description_de'] ?? ''; }
    public string $descriptionEn { get => $this->data['description_en'] ?? ''; }
    public string $descriptionFr { get => $this->data['description_fr'] ?? ''; }
    public string $descriptionEs { get => $this->data['description_es'] ?? ''; }
    public string $descriptionNl { get => $this->data['description_nl'] ?? ''; }
    public string $descriptionIt { get => $this->data['description_it'] ?? ''; }
    public string $descriptionPt { get => $this->data['description_pt'] ?? ''; }
    public string $descriptionPl { get => $this->data['description_pl'] ?? ''; }
    public string $descriptionSl { get => $this->data['description_sl'] ?? ''; }

    // Description Thank You Page
    public string $descriptionThankyouPage { get => $this->data['description_thankyou_page'] ?? ''; }
    public string $descriptionThankyouPageDe { get => $this->data['description_thankyou_page_de'] ?? ''; }
    public string $descriptionThankyouPageEn { get => $this->data['description_thankyou_page_en'] ?? ''; }
    public string $descriptionThankyouPageFr { get => $this->data['description_thankyou_page_fr'] ?? ''; }
    public string $descriptionThankyouPageEs { get => $this->data['description_thankyou_page_es'] ?? ''; }
    public string $descriptionThankyouPageNl { get => $this->data['description_thankyou_page_nl'] ?? ''; }
    public string $descriptionThankyouPageIt { get => $this->data['description_thankyou_page_it'] ?? ''; }
    public string $descriptionThankyouPagePt { get => $this->data['description_thankyou_page_pt'] ?? ''; }
    public string $descriptionThankyouPagePl { get => $this->data['description_thankyou_page_pl'] ?? ''; }
    public string $descriptionThankyouPageSl { get => $this->data['description_thankyou_page_sl'] ?? ''; }

    // Opt-in Text
    public string $optinText { get => $this->data['optin_text'] ?? ''; }
    public string $optinTextDe { get => $this->data['optin_text_de'] ?? ''; }
    public string $optinTextEn { get => $this->data['optin_text_en'] ?? ''; }
    public string $optinTextFr { get => $this->data['optin_text_fr'] ?? ''; }
    public string $optinTextEs { get => $this->data['optin_text_es'] ?? ''; }
    public string $optinTextNl { get => $this->data['optin_text_nl'] ?? ''; }
    public string $optinTextIt { get => $this->data['optin_text_it'] ?? ''; }
    public string $optinTextPt { get => $this->data['optin_text_pt'] ?? ''; }
    public string $optinTextPl { get => $this->data['optin_text_pl'] ?? ''; }
    public string $optinTextSl { get => $this->data['optin_text_sl'] ?? ''; }

    // Media
    public string $imageUrl { get => $this->data['image_url'] ?? ''; }
    public string $imageId { get => $this->data['image_id'] ?? ''; }

    // Owner/User
    public int $userId { get => (int)($this->data['user_id'] ?? 0); }
    public int $ownerId { get => (int)($this->data['owner_id'] ?? 0); }
    public string $ownerName { get => $this->data['owner_name'] ?? ''; }

    // Product Organization
    public int $productGroupId { get => (int)($this->data['product_group_id'] ?? 0); }
    public string $productGroupName { get => $this->data['product_group_name'] ?? ''; }
    public int $productTypeId { get => (int)($this->data['product_type_id'] ?? 0); }

    // Status Flags (Y/N converted to bool)
    public bool $isActive { get => ($this->data['is_active'] ?? 'N') === 'Y'; }
    public bool $isDeleted { get => ($this->data['is_deleted'] ?? 'N') === 'Y'; }
    public bool $isAddressInputMandatory { get => ($this->data['is_address_input_mandatory'] ?? 'N') === 'Y'; }
    public bool $isPhoneNoMandatory { get => ($this->data['is_phone_no_mandatory'] ?? 'N') === 'Y'; }
    public bool $isSearchEngineAllowed { get => ($this->data['is_search_engine_allowed'] ?? 'N') === 'Y'; }
    public bool $isAffiliationAutoAccepted { get => ($this->data['is_affiliation_auto_accepted'] ?? 'N') === 'Y'; }
    public bool $isFreeUpsellEnabled { get => ($this->data['is_free_upsell_enabled'] ?? 'N') === 'Y'; }
    public bool $isFreeUpsellStarted { get => ($this->data['is_free_upsell_started'] ?? 'N') === 'Y'; }
    public bool $isFreeUpsellStopped { get => ($this->data['is_free_upsell_stopped'] ?? 'N') === 'Y'; }
    public bool $isQuantityEditableAfterPurchase { get => ($this->data['is_quantity_editable_after_purchase'] ?? 'N') === 'Y'; }
    public bool $isTitleInputShown { get => ($this->data['is_title_input_shown'] ?? 'N') === 'Y'; }
    public bool $isNameShownOnBankStatement { get => ($this->data['is_name_shown_on_bank_statement'] ?? 'N') === 'Y'; }
    public bool $hasAddrSalutation { get => ($this->data['has_addr_salutation'] ?? 'N') === 'Y'; }
    public bool $isVatShown { get => ($this->data['is_vat_shown'] ?? 'N') === 'Y'; }
    public bool $isUpsellDoublePurchasePrevented { get => ($this->data['is_upsell_double_purchase_prevented'] ?? 'N') === 'Y'; }
    public bool $isOptinCheckboxShown { get => ($this->data['is_optin_checkbox_shown'] ?? 'N') === 'Y'; }
    public bool $addOrderDataToThankyouPageUrl { get => ($this->data['add_order_data_to_thankyou_page_url'] ?? 'N') === 'Y'; }
    public bool $addOrderDataToUpsellSalesPageUrl { get => ($this->data['add_order_data_to_upsell_sales_page_url'] ?? 'N') === 'Y'; }
    public bool $redirectToCustomUpsellThankyouPage { get => ($this->data['redirect_to_custom_upsell_thankyou_page'] ?? 'N') === 'Y'; }
    public bool $addOrderDataToUpsellThankyouPageUrl { get => ($this->data['add_order_data_to_upsell_thankyou_page_url'] ?? 'N') === 'Y'; }

    // String fields (can be empty or have special values)
    public string $isPhoneNoInputShown { get => $this->data['is_phone_no_input_shown'] ?? 'hidden'; }
    public string $isQuantityEditableBeforePurchase { get => $this->data['is_quantity_editable_before_purchase'] ?? ''; }

    // Currency & Pricing
    public string $currency { get => $this->data['currency'] ?? 'EUR'; }
    public string $affiliateCommission { get => $this->data['affiliate_commission'] ?? '0.00'; }
    public string $affiliateCommissionFix { get => $this->data['affiliate_commission_fix'] ?? '0.00'; }
    public string $affiliateCommissionCur { get => $this->data['affiliate_commission_cur'] ?? 'EUR'; }

    // URLs
    public string $salespageUrl { get => $this->data['salespage_url'] ?? ''; }
    public string $orderformCustomerUrl { get => $this->data['orderform_customer_url'] ?? ''; }
    public string $orderformPreviewUrl { get => $this->data['orderform_preview_url'] ?? ''; }
    public string $thankyouUrl { get => $this->data['thankyou_url'] ?? ''; }
    public string $upsellSalespageUrl { get => $this->data['upsell_salespage_url'] ?? ''; }
    public string $upsellThankyouPageUrl { get => $this->data['upsell_thankyou_page_url'] ?? ''; }
    public string $upsellFreeflowThankyouUrl { get => $this->data['upsell_freeflow_thankyou_url'] ?? ''; }

    // Configuration
    public string $language { get => $this->data['language'] ?? 'de'; }
    public string $country { get => $this->data['country'] ?? ''; }
    public string $buyerType { get => $this->data['buyer_type'] ?? ''; }
    public string $tag { get => $this->data['tag'] ?? ''; }
    public string $note { get => $this->data['note'] ?? ''; }
    public string $orderformId { get => $this->data['orderform_id'] ?? ''; }

    // Inventory
    public string $unitsLeft { get => $this->data['units_left'] ?? ''; }
    public string $maxQuantity { get => $this->data['max_quantity'] ?? ''; }

    // Payment Methods
    public string $payMethods { get => $this->data['pay_methods'] ?? ''; }

    // Service/Rebilling
    public string $serviceInterval { get => $this->data['service_interval'] ?? 'auto'; }
    public string $serviceDate { get => $this->data['service_date'] ?? ''; }
    public string $singlePaymentServicePeriod { get => $this->data['single_payment_service_period'] ?? ''; }

    // Encryption
    public string $encryptOrderDataOfThankyouPageUrl { get => $this->data['encrypt_order_data_of_thankyou_page_url'] ?? 'none'; }
    public string $encryptOrderDataOfUpsellThankyouPageUrl { get => $this->data['encrypt_order_data_of_upsell_thankyou_page_url'] ?? 'none'; }

    // Notification Emails
    public string $notifyPaymentEmails { get => $this->data['notify_payment_emails'] ?? ''; }
    public string $notifyRefundEmails { get => $this->data['notify_refund_emails'] ?? ''; }
    public string $notifyChargebackEmails { get => $this->data['notify_chargeback_emails'] ?? ''; }
    public string $notifyMissedPaymentEmails { get => $this->data['notify_missed_payment_emails'] ?? ''; }
    public string $notifyRebillingStartStopEmails { get => $this->data['notify_rebilling_start_stop_emails'] ?? ''; }
    public string $notifyRebillingPaymentEmails { get => $this->data['notify_rebilling_payment_emails'] ?? ''; }
    public string $notifyAffiliateEmails { get => $this->data['notify_affiliate_emails'] ?? ''; }
    public string $notifyAddonsFor { get => $this->data['notify_addons_for'] ?? ''; }

    // Date Fields
    public ?\DateTimeInterface $createdAt {
        get => isset($this->data['created_at']) && !empty($this->data['created_at'])
            ? new \DateTimeImmutable($this->data['created_at'])
            : null;
    }
    public ?\DateTimeInterface $modifiedAt {
        get => isset($this->data['modified_at']) && !empty($this->data['modified_at'])
            ? new \DateTimeImmutable($this->data['modified_at'])
            : null;
    }
    public ?string $stopSalesAt { get => !empty($this->data['stop_sales_at']) ? $this->data['stop_sales_at'] : null; }

    // Approval Status
    public array $approvalStatusList { get => $this->data['approval_status_list'] ?? []; }
    public string $approvalStatus { get => $this->data['approval_status'] ?? ''; }
    public string $approvalStatusMsg { get => $this->data['approval_status_msg'] ?? ''; }

    /**
     * Constructor
     *
     * @param array $data Raw data from API response
     */
    public function __construct(
        private readonly array $data
    ) {
    }

    /**
     * Create instance from array data
     *
     * @param array $data Raw data from API response
     * @param Response|null $rawResponse Optional raw HTTP response
     * @return static
     */
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self($data);
    }
}

/**
 * List Products Response
 *
 * Response containing a list of products.
 */
final class ListProductsResponse extends AbstractResponse
{
    /**
     * @param array<ProductListItem> $products Array of product list items
     * @param int $totalCount Total number of products
     */
    public function __construct(
        public readonly array $products,
        public readonly int $totalCount,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $products = [];

        if (isset($data['products']) && is_array($data['products'])) {
            foreach ($data['products'] as $product) {
                $products[] = ProductListItem::fromArray($product);
            }
        }

        $instance = new self(
            products: $products,
            totalCount: count($products), // DS24 API doesn't return total_count, so we count the array
        );

        return $instance;
    }
}
