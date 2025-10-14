<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\PaymentPlan;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class ListPaymentPlansRequest extends AbstractRequest
{
    public function __construct() {}
    public function getEndpoint(): string { return 'listPaymentPlans'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return []; }
}
