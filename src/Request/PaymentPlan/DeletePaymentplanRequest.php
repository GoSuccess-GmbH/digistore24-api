<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\PaymentPlan;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class DeletePaymentplanRequest extends AbstractRequest
{
    public function __construct(private string $paymentplanId) {}
    public function getEndpoint(): string { return 'deletePaymentplan'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array { return ['paymentplan_id' => $this->paymentplanId]; }
}
