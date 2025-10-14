<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Voucher;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class UpdateVoucherRequest extends AbstractRequest
{
    public function __construct(private string $code, private array $data) {}
    public function getEndpoint(): string { return 'updateVoucher'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return array_merge(['code' => $this->code], $this->data);
    }
}
