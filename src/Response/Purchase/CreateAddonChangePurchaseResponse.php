<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Create Addon Change Purchase Response
 * 
 * Response after creating a package change order.
 */
final class CreateAddonChangePurchaseResponse extends AbstractResponse
{
    /**
     * @param string $createdPurchaseId The ID of the new order
     * @param string $paymentStatus The payment status
     * @param string $paymentStatusMsg Payment status in readable form
     * @param string $billingStatus Status of the new order
     * @param string $billingStatusMsg Order status in readable form
     * @param string|null $payUrl URL to restart payments if payment failed
     */
    public function __construct(
        public readonly string $createdPurchaseId,
        public readonly string $paymentStatus,
        public readonly string $paymentStatusMsg,
        public readonly string $billingStatus,
        public readonly string $billingStatusMsg,
        public readonly ?string $payUrl = null,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $instance = new self(
            createdPurchaseId: self::getValue($data, 'created_purchase_id', 'string', ''),
            paymentStatus: self::getValue($data, 'payment_status', 'string', ''),
            paymentStatusMsg: self::getValue($data, 'payment_status_msg', 'string', ''),
            billingStatus: self::getValue($data, 'billing_status', 'string', ''),
            billingStatusMsg: self::getValue($data, 'billing_status_msg', 'string', ''),
            payUrl: self::getValue($data, 'pay_url', 'string'),
        );

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
