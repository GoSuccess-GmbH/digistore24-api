<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\PaymentPlan;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdatePaymentplanRequest extends AbstractRequest
{
    public function __construct(private string $paymentplanId, private array $data) {}
    public function getEndpoint(): string { return 'updatePaymentplan'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['paymentplan_id' => $this->paymentplanId], $this->data);
    }
}
