<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;

/**
 * Voucher Resource
 * 
 * Manage discount vouchers and coupon codes.
 * 
 * @link https://digistore24.com/api/docs/tags/voucher
 */
final class VoucherResource extends AbstractResource
{
    /**
     * Get voucher information
     * 
     * TODO: Implement when getVoucher endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/getVoucher.yaml
     * 
     * @example
     * ```php
     * $request = new GetVoucherRequest(voucherCode: 'SUMMER2024');
     * $voucher = $client->vouchers->get($request);
     * echo "Discount: {$voucher->discountPercent}%\n";
     * ```
     */
    // public function get(GetVoucherRequest $request): GetVoucherResponse
    // {
    //     return $this->executeTyped($request, GetVoucherResponse::class);
    // }
}
