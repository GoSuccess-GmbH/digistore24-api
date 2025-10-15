<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Payment Plan Request
 *
 * Creates a new payment plan with installment configuration.
 */
final class CreatePaymentplanRequest extends AbstractRequest
{
    /**
     * @param array $data The payment plan configuration (number of installments, amounts, intervals, etc.)
     */
    public function __construct(private array $data) {}

    public function getEndpoint(): string { return '/createPaymentplan'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array { return $this->data; }
}
