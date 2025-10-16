<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\PaymentPlan;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Payment Plans Response
 *
 * Response object for the PaymentPlan API endpoint.
 */
final class ListPaymentPlansResponse extends AbstractResponse
{
    public function __construct(private array $paymentPlans)
    {
    }

    public function getPaymentPlans(): array
    {
        return $this->paymentPlans;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(paymentPlans: $data['data']['payment_plans'] ?? []);
    }
}
