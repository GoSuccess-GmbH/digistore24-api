<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Product List Item
 *
 * Represents a product in a list.
 */
final class ProductListItem
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $nameIntern,
        public readonly string $description,
        public readonly string $imageUrl,
        public readonly string $imageId,
        public readonly string $userId,
        public readonly string $ownerId,
        public readonly string $ownerName,
        public readonly string $productGroupId,
        public readonly string $productGroupName,
        public readonly string $productTypeId,
        public readonly bool $isActive,
        public readonly bool $isDeleted,
        public readonly string $currency,
        public readonly string $affiliateCommission,
        public readonly string $affiliateCommissionFix,
        public readonly string $affiliateCommissionCur,
        public readonly bool $isAffiliationAutoAccepted,
        public readonly string $salespageUrl,
        public readonly string $orderformCustomerUrl,
        public readonly string $orderformPreviewUrl,
        public readonly string $thankyouUrl,
        public readonly string $language,
        public readonly string $country,
        public readonly string $buyerType,
        public readonly string $tag,
        public readonly string $note,
        public readonly string $unitsLeft,
        public readonly string $maxQuantity,
        public readonly bool $isAddressInputMandatory,
        public readonly string $isPhoneNoInputShown,
        public readonly bool $isPhoneNoMandatory,
        public readonly bool $isSearchEngineAllowed,
        public readonly string $payMethods,
        public readonly string $serviceInterval,
        public readonly string $serviceDate,
        public readonly ?\DateTimeInterface $createdAt,
        public readonly ?\DateTimeInterface $modifiedAt,
        public readonly ?string $stopSalesAt,
        public readonly array $approvalStatusList,
        public readonly string $approvalStatus,
        public readonly string $approvalStatusMsg,
    ) {
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            id: (string)($data['id'] ?? ''),
            name: $data['name'] ?? '',
            nameIntern: $data['name_intern'] ?? '',
            description: $data['description'] ?? '',
            imageUrl: $data['image_url'] ?? '',
            imageId: $data['image_id'] ?? '',
            userId: (string)($data['user_id'] ?? ''),
            ownerId: (string)($data['owner_id'] ?? ''),
            ownerName: $data['owner_name'] ?? '',
            productGroupId: (string)($data['product_group_id'] ?? ''),
            productGroupName: $data['product_group_name'] ?? '',
            productTypeId: (string)($data['product_type_id'] ?? ''),
            isActive: ($data['is_active'] ?? 'N') === 'Y',
            isDeleted: ($data['is_deleted'] ?? 'N') === 'Y',
            currency: $data['currency'] ?? 'EUR',
            affiliateCommission: $data['affiliate_commission'] ?? '0.00',
            affiliateCommissionFix: $data['affiliate_commission_fix'] ?? '0.00',
            affiliateCommissionCur: $data['affiliate_commission_cur'] ?? 'EUR',
            isAffiliationAutoAccepted: ($data['is_affiliation_auto_accepted'] ?? 'N') === 'Y',
            salespageUrl: $data['salespage_url'] ?? '',
            orderformCustomerUrl: $data['orderform_customer_url'] ?? '',
            orderformPreviewUrl: $data['orderform_preview_url'] ?? '',
            thankyouUrl: $data['thankyou_url'] ?? '',
            language: $data['language'] ?? 'de',
            country: $data['country'] ?? '',
            buyerType: $data['buyer_type'] ?? '',
            tag: $data['tag'] ?? '',
            note: $data['note'] ?? '',
            unitsLeft: $data['units_left'] ?? '',
            maxQuantity: $data['max_quantity'] ?? '',
            isAddressInputMandatory: ($data['is_address_input_mandatory'] ?? 'N') === 'Y',
            isPhoneNoInputShown: $data['is_phone_no_input_shown'] ?? 'hidden',
            isPhoneNoMandatory: ($data['is_phone_no_mandatory'] ?? 'N') === 'Y',
            isSearchEngineAllowed: ($data['is_search_engine_allowed'] ?? 'N') === 'Y',
            payMethods: $data['pay_methods'] ?? '',
            serviceInterval: $data['service_interval'] ?? 'auto',
            serviceDate: $data['service_date'] ?? '',
            createdAt: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            modifiedAt: isset($data['modified_at']) ? new \DateTimeImmutable($data['modified_at']) : null,
            stopSalesAt: !empty($data['stop_sales_at']) ? $data['stop_sales_at'] : null,
            approvalStatusList: $data['approval_status_list'] ?? [],
            approvalStatus: $data['approval_status'] ?? '',
            approvalStatusMsg: $data['approval_status_msg'] ?? '',
        );
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
