<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Vouchers Response
 *
 * Response object for the Voucher API endpoint.
 */
final class ListVouchersResponse extends AbstractResponse
{
    /** @param array<string, mixed> $vouchers */
    public function __construct(private array $vouchers)
    {
    }

    /** @return array<string, mixed> */
    public function getVouchers(): array
    {
        return $this->vouchers;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $vouchersData = $innerData['vouchers'] ?? [];
        if (!is_array($vouchersData)) {
            $vouchersData = [];
        }
        /** @var array<string, mixed> $validatedVouchers */
        $validatedVouchers = $vouchersData;

        return new self(vouchers: $validatedVouchers);
    }
}
