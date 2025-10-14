<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Voucher;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class ListVouchersResponse extends AbstractResponse
{
    public function __construct(private array $vouchers)
    {
    }
    public function getVouchers(): array
    {
        return $this->vouchers;
    }
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(vouchers: $data['data']['vouchers'] ?? []);
    }
}
