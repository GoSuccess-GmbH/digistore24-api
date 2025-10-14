<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Voucher;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class CreateVoucherRequest extends AbstractRequest
{
    public function __construct(private array $data) {}
    public function getEndpoint(): string { return 'createVoucher'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array { return $this->data; }
}
