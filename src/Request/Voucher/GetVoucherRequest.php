<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Voucher;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetVoucherRequest extends AbstractRequest
{
    public function __construct(private string $code) {}
    public function getEndpoint(): string { return 'getVoucher'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['code' => $this->code]; }
}
