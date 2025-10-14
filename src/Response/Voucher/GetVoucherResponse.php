<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Voucher;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Get Voucher Response
 *
 * Response object for the Voucher API endpoint.
 */
final class GetVoucherResponse extends AbstractResponse
{
    public function __construct(private array $data)
    {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getCode(): ?string
    {
        return $this->data['code'] ?? null;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(data: $data['data'] ?? []);
    }
}