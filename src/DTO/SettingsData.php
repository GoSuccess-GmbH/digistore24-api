<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Settings Data Transfer Object
 *
 * Data structure for additional order form settings in Buy URL creation.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/createBuyUrl.yaml
 */
final class SettingsData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * ID of the order form to use
     */
    public ?string $orderformId = null;

    /**
     * Product image ID or mapping
     * Can be a simple string or an associative array mapping product IDs to image IDs
     *
     * @var string|array<string, string>|null
     */
    public string|array|null $img = null;

    /**
     * Affiliate commission percentage
     */
    public ?float $affiliateCommissionRate = null {
        set {
            if ($value !== null && ($value < 0 || $value > 100)) {
                throw new \InvalidArgumentException('Affiliate commission rate must be between 0 and 100');
            }
            $this->affiliateCommissionRate = $value;
        }
    }

    /**
     * Fixed affiliate commission amount
     */
    public ?float $affiliateCommissionFix = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Affiliate commission fix must be positive');
            }
            $this->affiliateCommissionFix = $value;
        }
    }

    /**
     * Voucher code to apply
     */
    public ?string $voucherCode = null;

    /**
     * Discount percentage on first payment
     */
    public ?float $voucher1stRate = null {
        set {
            if ($value !== null && ($value < 0 || $value > 100)) {
                throw new \InvalidArgumentException('Voucher first rate must be between 0 and 100');
            }
            $this->voucher1stRate = $value;
        }
    }

    /**
     * Discount percentage on follow-up payments
     */
    public ?float $voucherOthRates = null {
        set {
            if ($value !== null && ($value < 0 || $value > 100)) {
                throw new \InvalidArgumentException('Voucher other rates must be between 0 and 100');
            }
            $this->voucherOthRates = $value;
        }
    }

    /**
     * Discount amount on first payment
     */
    public ?float $voucher1stAmount = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Voucher first amount must be positive');
            }
            $this->voucher1stAmount = $value;
        }
    }

    /**
     * Discount amount on follow-up payments
     */
    public ?float $voucherOthAmounts = null {
        set {
            if ($value !== null && $value < 0) {
                throw new \InvalidArgumentException('Voucher other amounts must be positive');
            }
            $this->voucherOthAmounts = $value;
        }
    }

    /**
     * Require payment method supporting automated payments
     */
    public ?bool $forceRebilling = null;

    /**
     * Allowed payment methods
     *
     * @var list<string>|null
     */
    public ?array $payMethods = null {
        set {
            if ($value !== null) {
                $validMethods = ['paypal', 'sezzle', 'creditcard', 'elv', 'banktransfer', 'klarna'];
                foreach ($value as $method) {
                    if (! in_array($method, $validMethods, true)) {
                        throw new \InvalidArgumentException("Invalid payment method: {$method}. Allowed: " . implode(', ', $validMethods));
                    }
                }
            }
            $this->payMethods = $value;
        }
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];
        if ($this->orderformId !== null) {
            $data['orderform_id'] = $this->orderformId;
        }
        if ($this->img !== null) {
            $data['img'] = $this->img;
        }
        if ($this->affiliateCommissionRate !== null) {
            $data['affiliate_commission_rate'] = $this->affiliateCommissionRate;
        }
        if ($this->affiliateCommissionFix !== null) {
            $data['affiliate_commission_fix'] = $this->affiliateCommissionFix;
        }
        if ($this->voucherCode !== null) {
            $data['voucher_code'] = $this->voucherCode;
        }
        if ($this->voucher1stRate !== null) {
            $data['voucher_1st_rate'] = $this->voucher1stRate;
        }
        if ($this->voucherOthRates !== null) {
            $data['voucher_oth_rates'] = $this->voucherOthRates;
        }
        if ($this->voucher1stAmount !== null) {
            $data['voucher_1st_amount'] = $this->voucher1stAmount;
        }
        if ($this->voucherOthAmounts !== null) {
            $data['voucher_oth_amounts'] = $this->voucherOthAmounts;
        }
        if ($this->forceRebilling !== null) {
            $data['force_rebilling'] = $this->forceRebilling;
        }
        if ($this->payMethods !== null) {
            $data['pay_methods'] = $this->payMethods;
        }

        return $data;
    }
}
