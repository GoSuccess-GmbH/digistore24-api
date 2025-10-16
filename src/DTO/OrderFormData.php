<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Order Form Data Transfer Object
 *
 * Complete data structure for order form creation and updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createOrderform.yaml
 * @link https://digistore24.com/api/docs/paths/updateOrderform.yaml
 */
final class OrderFormData
{
    /**
     * Name of the order form (required, max 63 chars)
     */
    public ?string $name = null {
        set {
            if ($value !== null && strlen($value) > 63) {
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
                throw new \InvalidArgumentException("Invalid layout: $value. Allowed: widget, legacy");
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
                throw new \InvalidArgumentException("Invalid background_style: $value. Allowed: white, blue");
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
                throw new \InvalidArgumentException("Invalid step_count: $value. Allowed: 1, 2, 3");
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
                throw new \InvalidArgumentException("Invalid shipping_position: $value. Allowed: after_cart, before_cart");
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
                throw new \InvalidArgumentException("Invalid tab_style: $value. Allowed: bigtabs, image, image_url");
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
                throw new \InvalidArgumentException("Invalid order_bump_style: $value. Allowed: none, dashed");
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
                throw new \InvalidArgumentException("Invalid orderbump_position: $value");
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
                throw new \InvalidArgumentException("Invalid refund_waiver_position: $value");
            }
            $this->refundWaiverPosition = $value;
        }
    }

    /**
     * Custom CSS for the order form
     */
    public ?string $customCss = null;

    /**
     * Create OrderFormData from array
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->name = isset($data['name']) && is_string($data['name']) ? $data['name'] : null;
        $instance->layout = isset($data['layout']) && is_string($data['layout']) ? $data['layout'] : null;
        $instance->backgroundStyle = isset($data['background_style']) && is_string($data['background_style']) ? $data['background_style'] : null;
        $instance->stepCount = isset($data['step_count']) && is_numeric($data['step_count']) ? (int)$data['step_count'] : null;
        $instance->shippingPosition = isset($data['shipping_position']) && is_string($data['shipping_position']) ? $data['shipping_position'] : null;
        $instance->summaryPositions = isset($data['summary_positions']) && is_string($data['summary_positions']) ? $data['summary_positions'] : null;
        $instance->flexElementsOrder = isset($data['flex_elements_order']) && is_string($data['flex_elements_order']) ? $data['flex_elements_order'] : null;
        $instance->tabStyle = isset($data['tab_style']) && is_string($data['tab_style']) ? $data['tab_style'] : null;
        $instance->tabText1Hl = isset($data['tab_text_1_hl']) && is_string($data['tab_text_1_hl']) ? $data['tab_text_1_hl'] : null;
        $instance->tabText1Sl = isset($data['tab_text_1_sl']) && is_string($data['tab_text_1_sl']) ? $data['tab_text_1_sl'] : null;
        $instance->tabText2Hl = isset($data['tab_text_2_hl']) && is_string($data['tab_text_2_hl']) ? $data['tab_text_2_hl'] : null;
        $instance->tabText2Sl = isset($data['tab_text_2_sl']) && is_string($data['tab_text_2_sl']) ? $data['tab_text_2_sl'] : null;
        $instance->tabText3Hl = isset($data['tab_text_3_hl']) && is_string($data['tab_text_3_hl']) ? $data['tab_text_3_hl'] : null;
        $instance->tabText3Sl = isset($data['tab_text_3_sl']) && is_string($data['tab_text_3_sl']) ? $data['tab_text_3_sl'] : null;
        $instance->tabImage1Id = isset($data['tab_image_1_id']) && is_string($data['tab_image_1_id']) ? $data['tab_image_1_id'] : null;
        $instance->tabImage2Id = isset($data['tab_image_2_id']) && is_string($data['tab_image_2_id']) ? $data['tab_image_2_id'] : null;
        $instance->tabImage3Id = isset($data['tab_image_3_id']) && is_string($data['tab_image_3_id']) ? $data['tab_image_3_id'] : null;
        $instance->tabImage1Url = isset($data['tab_image_1_url']) && is_string($data['tab_image_1_url']) ? $data['tab_image_1_url'] : null;
        $instance->tabImage2Url = isset($data['tab_image_2_url']) && is_string($data['tab_image_2_url']) ? $data['tab_image_2_url'] : null;
        $instance->tabImage3Url = isset($data['tab_image_3_url']) && is_string($data['tab_image_3_url']) ? $data['tab_image_3_url'] : null;
        $instance->orderBumpStyle = isset($data['order_bump_style']) && is_string($data['order_bump_style']) ? $data['order_bump_style'] : null;
        $instance->orderbumpProductId = isset($data['orderbump_product_id']) && is_string($data['orderbump_product_id']) ? $data['orderbump_product_id'] : null;
        $instance->orderbumpHeadline = isset($data['orderbump_headline']) && is_string($data['orderbump_headline']) ? $data['orderbump_headline'] : null;
        $instance->orderbumpHtml = isset($data['orderbump_html']) && is_string($data['orderbump_html']) ? $data['orderbump_html'] : null;
        $instance->orderbumpPosition = isset($data['orderbump_position']) && is_string($data['orderbump_position']) ? $data['orderbump_position'] : null;
        $instance->refundWaiverPosition = isset($data['refund_waiver_position']) && is_string($data['refund_waiver_position']) ? $data['refund_waiver_position'] : null;
        $instance->customCss = isset($data['custom_css']) && is_string($data['custom_css']) ? $data['custom_css'] : null;

        return $instance;
    }

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
