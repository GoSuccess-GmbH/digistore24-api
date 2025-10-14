<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\PaymentPlan;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class DeletePaymentplanRequest extends AbstractRequest
{
    public function __construct(private string $paymentplanId) {}
    public function getEndpoint(): string { return 'deletePaymentplan'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array { return ['paymentplan_id' => $this->paymentplanId]; }
}
