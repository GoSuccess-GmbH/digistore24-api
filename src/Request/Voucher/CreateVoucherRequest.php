<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DTO\VoucherData;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

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
        private VoucherData $voucher,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/createVoucher';
    }

    public function getMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return $this->voucher->toArray();
    }
}
