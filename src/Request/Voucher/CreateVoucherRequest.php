<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Voucher;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class CreateVoucherRequest extends AbstractRequest
{
    public function __construct(private array $data) {}
    public function endpoint(): string { return 'createVoucher'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return $this->data; }
}
