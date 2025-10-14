<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Voucher;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListVouchersResponse extends AbstractResponse
{
    public function __construct(private array $vouchers) {}
    public function getVouchers(): array { return $this->vouchers; }
    public static function fromArray(array $data): self
    {
        return new self(vouchers: $data['data']['vouchers'] ?? []);
    }
}
