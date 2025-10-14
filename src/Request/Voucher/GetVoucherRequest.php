<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Voucher;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class GetVoucherRequest extends AbstractRequest
{
    public function __construct(private string $code) {}
    public function endpoint(): string { return 'getVoucher'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['code' => $this->code]; }
}
