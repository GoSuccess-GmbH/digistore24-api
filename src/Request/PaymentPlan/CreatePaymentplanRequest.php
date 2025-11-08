<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DTO\PaymentPlanFullData;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Create Payment Plan Request
 *
 * Creates a new payment plan with installment configuration.
 */
final class CreatePaymentplanRequest extends AbstractRequest
{
    /**
     * @param PaymentPlanFullData $paymentPlan The payment plan configuration
     */
    public function __construct(private PaymentPlanFullData $paymentPlan)
    {
    }

    public function getEndpoint(): string
    {
        return '/createPaymentplan';
    }

    public function getMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return $this->paymentPlan->toArray();
    }
}
