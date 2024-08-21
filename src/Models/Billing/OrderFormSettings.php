<?php

namespace GoSuccess\Digistore24\Models\Billing;
use GoSuccess\Digistore24\Abstracts\Model;
use GoSuccess\Digistore24\Attributes\ArrayItemType;

class OrderFormSettings extends Model
{
    public ?int $orderform_id = null;

    public ?int $img = null;

    public ?float $affiliate_commission_rate = null;

    public ?float $affiliate_commission_fix = null;

    public ?string $voucher_code = null;

    public ?string $voucher_1st_rate = null;

    public ?string $voucher_1st_amount = null;

    public ?string $voucher_oth_amounts = null;

    public ?bool $force_rebilling = null;

    #[ArrayItemType(type: 'enum', object: 'GoSuccess\Digistore24\Enumerations\Billing\PayMethod')]
    public ?array $pay_methods = null;

    public ?int $quantity = null;

    public ?string $product_country = null;
}
