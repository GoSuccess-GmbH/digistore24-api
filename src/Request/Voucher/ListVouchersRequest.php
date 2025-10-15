<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * List Vouchers Request
 *
 * Retrieves a list of all vouchers.
 */
final class ListVouchersRequest extends AbstractRequest
{
    public function __construct()
    {
    }

    public function getEndpoint(): string
    {
        return 'listVouchers';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        return [];
    }
}
