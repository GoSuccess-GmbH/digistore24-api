<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Voucher;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdateVoucherRequest extends AbstractRequest
{
    public function __construct(private string $code, private array $data) {}
    public function getEndpoint(): string { return 'updateVoucher'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['code' => $this->code], $this->data);
    }
}
