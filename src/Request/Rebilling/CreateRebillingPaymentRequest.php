<?php
declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Rebilling;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Create Rebilling Payment Request
 *
 * Creates a manual rebilling payment for a recurring subscription.
 */
final class CreateRebillingPaymentRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The unique identifier of the purchase
     * @param array $data Optional payment data (amount, date, etc.)
     */
    public function __construct(private string $purchaseId, private array $data = []) {}

    public function getEndpoint(): string { return 'createRebillingPayment'; }

    public function method(): Method { return Method::POST; }

    public function toArray(): array
    {
        return array_merge(['purchase_id' => $this->purchaseId], $this->data);
    }
}
