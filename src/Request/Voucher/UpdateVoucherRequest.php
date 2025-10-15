<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DTO\VoucherData;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

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

    public function method(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return array_merge(
            ['code' => $this->code],
            $this->voucher->toArray(),
        );
    }
}
