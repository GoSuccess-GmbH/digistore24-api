<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * List Vouchers Response
 *
 * Response object for the Voucher API endpoint.
 */
final class ListVouchersResponse extends AbstractResponse
{
    public function __construct(private array $vouchers)
    {
    }

    public function getVouchers(): array
    {
        return $this->vouchers;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(vouchers: $data['data']['vouchers'] ?? []);
    }
}
