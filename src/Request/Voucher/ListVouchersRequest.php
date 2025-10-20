<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

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
        return '/listVouchers';
    }

    public function getMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return [];
    }
}
