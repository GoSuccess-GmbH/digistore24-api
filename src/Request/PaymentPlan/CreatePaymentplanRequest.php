<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\PaymentPlan;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class CreatePaymentplanRequest extends AbstractRequest
{
    public function __construct(private array $data) {}
    public function getEndpoint(): string { return 'createPaymentplan'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return $this->data; }
}
