<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Request\Billing;

use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;

/**
 * Request to partially refund a purchase.
 *
 * Refunds a partial amount of a payment (not the complete payment).
 * The refund amount is treated as a discount. The order status does not change.
 *
 * Important:
 * - Only refunds a portion of the payment
 * - Amount must not exceed the payment amount
 * - Order status remains unchanged (use refundPurchase for full refunds)
 *
 * @see https://digistore24.com/api/docs/paths/refundPartially.yaml
 */
final readonly class RefundPartiallyRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The purchase ID to refund
     * @param float $amount The amount to refund (must not exceed payment amount)
     */
    public function __construct(
        private string $purchaseId,
        private float $amount,
    ) {}

    public function getEndpoint(): string
    {
        return 'refundPartially';
    }

    public function getMethod(): Method
    {
        return Method::POST;
    }

    public function getParameters(): array
    {
        return [
            'purchase_id' => $this->purchaseId,
            'amount' => $this->amount,
        ];
    }
}
