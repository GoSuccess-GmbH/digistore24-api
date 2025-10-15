<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\VoucherData;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Voucher Request
 *
 * Creates a new voucher/discount code.
 */
final class CreateVoucherRequest extends AbstractRequest
{
    /**
     * @param VoucherData $voucher Voucher configuration data
     */
    public function __construct(
        private VoucherData $voucher
    ) {
    }

    public function getEndpoint(): string
    {
        return '/createVoucher';
    }

    public function method(): Method
    {
        return Method::POST;
    }

    public function toArray(): array
    {
        return $this->voucher->toArray();
    }
}
