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
    /**
     * @param array<string, mixed> $paymentPlans
     */
    public function __construct(private array $paymentPlans)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getPaymentPlans(): array
    {
        return $this->paymentPlans;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $paymentPlans = $innerData['payment_plans'] ?? [];

        if (!is_array($paymentPlans)) {
            $paymentPlans = [];
        }

        /** @var array<string, mixed> $validatedPlans */
        $validatedPlans = $paymentPlans;

        return new self(paymentPlans: $validatedPlans);
    }
}
