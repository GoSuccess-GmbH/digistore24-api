<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\PaymentPlan;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Update Payment Plan Request
 *
 * Updates an existing payment plan's configuration.
 */
final class UpdatePaymentplanRequest extends AbstractRequest
{
    /**
     * @param string $paymentplanId The unique identifier of the payment plan to update
     * @param array $data The updated payment plan configuration
     */
    public function __construct(private string $paymentplanId, private array $data) {}

    public function getEndpoint(): string { return '/updatePaymentplan'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array
    {
        return array_merge(['paymentplan_id' => $this->paymentplanId], $this->data);
    }
}
