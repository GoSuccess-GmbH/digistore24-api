<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\VoucherData;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Update Voucher Request
 *
 * Updates an existing voucher's configuration.
 */
final class UpdateVoucherRequest extends AbstractRequest
{
    /**
     * @param string $code The voucher code
     * @param VoucherData $voucher Updated voucher data
     */
    public function __construct(
        private string $code,
        private VoucherData $voucher,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/updateVoucher';
    }

    public function method(): Method
    {
        return Method::POST;
    }

    public function toArray(): array
    {
        return array_merge(
            ['code' => $this->code],
            $this->voucher->toArray(),
        );
    }
}
