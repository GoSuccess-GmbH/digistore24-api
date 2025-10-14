<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\PaymentPlan;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class CreatePaymentplanRequest extends AbstractRequest
{
    public function __construct(private array $data) {}
    public function getEndpoint(): string { return 'createPaymentplan'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array { return $this->data; }
}
