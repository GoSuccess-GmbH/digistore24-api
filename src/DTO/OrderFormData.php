<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * Order Form Data Transfer Object
 *
 * Complete data structure for order form creation and updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createOrderform.yaml
 * @link https://digistore24.com/api/docs/paths/updateOrderform.yaml
 */
final class OrderFormData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * Name of the order form (required, max 63 chars)
     */
    public ?string $name = null {
        set {
            if ($value !== null && !Validator::isLength($value, null, 63)) {
                throw new \InvalidArgumentException('Order form name must not exceed 63 characters');
            }
            $this->name = $value;
        }
    }

    /**
     * Order form layout type
     */
    public ?string $layout = null {
        set {
            if ($value !== null && ! in_array($value, ['widget', 'legacy'], true)) {
                throw new \InvalidArgumentException("Invalid layout: {$value}. Allowed: widget, legacy");
            }
            $this->layout = $value;
        }
    }

    /**
     * Background style
     */
    public ?string $backgroundStyle = null {
        set {
            if ($value !== null && ! in_array($value, ['white', 'blue'], true)) {
                throw new \InvalidArgumentException("Invalid background_style: {$value}. Allowed: white, blue");
            }
            $this->backgroundStyle = $value;
        }
    }

    /**
     * Number of steps/tabs in the order form
     */
    public ?int $stepCount = null {
        set {
            if ($value !== null && ! in_array($value, [1, 2, 3], true)) {
                throw new \InvalidArgumentException("Invalid step_count: {$value}. Allowed: 1, 2, 3");
            }
            $this->stepCount = $value;
        }
    }

    /**
     * Position of shipping details relative to cart
     */
    public ?string $shippingPosition = null {
        set {
            if ($value !== null && ! in_array($value, ['after_cart', 'before_cart'], true)) {
                throw new \InvalidArgumentException("Invalid shipping_position: {$value}. Allowed: after_cart, before_cart");
            }
            $this->shippingPosition = $value;
        }
    }

    /**
     * Comma-separated positions for purchase order summaries
     */
    public ?string $summaryPositions = null;

    /**
     * Order of flex elements (order bumper, summary, refund waiver)
     */
    public ?string $flexElementsOrder = null;

    /**
     * Style of tabs
     */
    public ?string $tabStyle = null {
        set {
            if ($value !== null && ! in_array($value, ['bigtabs', 'image', 'image_url'], true)) {
                throw new \InvalidArgumentException("Invalid tab_style: {$value}. Allowed: bigtabs, image, image_url");
            }
            $this->tabStyle = $value;
        }
    }

    // Tab titles and subtitles for bigtabs
    public ?string $tabText1Hl = null;

    public ?string $tabText1Sl = null;

    public ?string $tabText2Hl = null;

    public ?string $tabText2Sl = null;

    public ?string $tabText3Hl = null;

    public ?string $tabText3Sl = null;

    // Tab image IDs and URLs
    public ?string $tabImage1Id = null;

    public ?string $tabImage2Id = null;

    public ?string $tabImage3Id = null;

    public ?string $tabImage1Url = null;

    public ?string $tabImage2Url = null;

    public ?string $tabImage3Url = null;

    /**
     * Style of order bump display
     */
    public ?string $orderBumpStyle = null {
        set {
            if ($value !== null && ! in_array($value, ['none', 'dashed'], true)) {
                throw new \InvalidArgumentException("Invalid order_bump_style: {$value}. Allowed: none, dashed");
            }
            $this->orderBumpStyle = $value;
        }
    }

    /**
     * Product ID for order bump (must be addon of main product)
     */
    public ?string $orderbumpProductId = null;

    /**
     * Headline for order bump
     */
    public ?string $orderbumpHeadline = null;

    /**
     * Text content for order bump
     */
    public ?string $orderbumpHtml = null;

    /**
     * Position of order bump
     */
    public ?string $orderbumpPosition = null {
        set {
            $allowed = ['before_playplan', 'after_payplan', 'before_checkout', 'before_pay_button', 'after_pay_button'];
            if ($value !== null && ! in_array($value, $allowed, true)) {
                throw new \InvalidArgumentException("Invalid orderbump_position: {$value}");
            }
            $this->orderbumpPosition = $value;
        }
    }

    /**
     * Position of refund waiver
     */
    public ?string $refundWaiverPosition = null {
        set {
            $allowed = ['before_playplan', 'after_payplan', 'before_checkout', 'before_pay_button', 'after_pay_button'];
            if ($value !== null && ! in_array($value, $allowed, true)) {
                throw new \InvalidArgumentException("Invalid refund_waiver_position: {$value}");
            }
            $this->refundWaiverPosition = $value;
        }
    }

    /**
     * Custom CSS for the order form
     */
    public ?string $customCss = null;

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->layout !== null) {
            $data['layout'] = $this->layout;
        }
        if ($this->backgroundStyle !== null) {
            $data['background_style'] = $this->backgroundStyle;
        }
        if ($this->stepCount !== null) {
            $data['step_count'] = $this->stepCount;
        }
        if ($this->shippingPosition !== null) {
            $data['shipping_position'] = $this->shippingPosition;
        }
        if ($this->summaryPositions !== null) {
            $data['summary_positions'] = $this->summaryPositions;
        }
        if ($this->flexElementsOrder !== null) {
            $data['flex_elements_order'] = $this->flexElementsOrder;
        }
        if ($this->tabStyle !== null) {
            $data['tab_style'] = $this->tabStyle;
        }
        if ($this->tabText1Hl !== null) {
            $data['tab_text_1_hl'] = $this->tabText1Hl;
        }
        if ($this->tabText1Sl !== null) {
            $data['tab_text_1_sl'] = $this->tabText1Sl;
        }
        if ($this->tabText2Hl !== null) {
            $data['tab_text_2_hl'] = $this->tabText2Hl;
        }
        if ($this->tabText2Sl !== null) {
            $data['tab_text_2_sl'] = $this->tabText2Sl;
        }
        if ($this->tabText3Hl !== null) {
            $data['tab_text_3_hl'] = $this->tabText3Hl;
        }
        if ($this->tabText3Sl !== null) {
            $data['tab_text_3_sl'] = $this->tabText3Sl;
        }
        if ($this->tabImage1Id !== null) {
            $data['tab_image_1_id'] = $this->tabImage1Id;
        }
        if ($this->tabImage2Id !== null) {
            $data['tab_image_2_id'] = $this->tabImage2Id;
        }
        if ($this->tabImage3Id !== null) {
            $data['tab_image_3_id'] = $this->tabImage3Id;
        }
        if ($this->tabImage1Url !== null) {
            $data['tab_image_1_url'] = $this->tabImage1Url;
        }
        if ($this->tabImage2Url !== null) {
            $data['tab_image_2_url'] = $this->tabImage2Url;
        }
        if ($this->tabImage3Url !== null) {
            $data['tab_image_3_url'] = $this->tabImage3Url;
        }
        if ($this->orderBumpStyle !== null) {
            $data['order_bump_style'] = $this->orderBumpStyle;
        }
        if ($this->orderbumpProductId !== null) {
            $data['orderbump_product_id'] = $this->orderbumpProductId;
        }
        if ($this->orderbumpHeadline !== null) {
            $data['orderbump_headline'] = $this->orderbumpHeadline;
        }
        if ($this->orderbumpHtml !== null) {
            $data['orderbump_html'] = $this->orderbumpHtml;
        }
        if ($this->orderbumpPosition !== null) {
            $data['orderbump_position'] = $this->orderbumpPosition;
        }
        if ($this->refundWaiverPosition !== null) {
            $data['refund_waiver_position'] = $this->refundWaiverPosition;
        }
        if ($this->customCss !== null) {
            $data['custom_css'] = $this->customCss;
        }

        return $data;
    }
}
