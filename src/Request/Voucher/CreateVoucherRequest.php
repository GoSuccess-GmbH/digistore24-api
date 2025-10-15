<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Voucher Request
 *
 * Creates a new voucher/discount code.
 */
final class CreateVoucherRequest extends AbstractRequest
{
    /**
     * @param array $data Voucher configuration data (code, discount, valid_until, etc.)
     */
    public function __construct(
        private array $data
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
        return $this->data;
    }
}
