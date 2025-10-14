<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Billing;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Response from creating a billing on demand order.
 *
 * Contains information about the created order including purchase ID,
 * payment status, and billing status.
 *
 * @see https://digistore24.com/api/docs/paths/createBillingOnDemand.yaml
 */
final class CreateBillingOnDemandResponse extends AbstractResponse
{
    public function __construct(
        private string $createdPurchaseId,
        private string $paymentStatus,
        private string $paymentStatusMsg,
        private string $billingStatus,
        private string $billingStatusMsg,
    ) {}

    /**
     * Get the ID of the newly created order.
     */
    public function getCreatedPurchaseId(): string
    {
        return $this->createdPurchaseId;
    }

    /**
     * Get the payment status code.
     */
    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }

    /**
     * Get the payment status in readable form.
     */
    public function getPaymentStatusMsg(): string
    {
        return $this->paymentStatusMsg;
    }

    /**
     * Get the billing status code.
     */
    public function getBillingStatus(): string
    {
        return $this->billingStatus;
    }

    /**
     * Get the billing status in readable form.
     */
    public function getBillingStatusMsg(): string
    {
        return $this->billingStatusMsg;
    }

    /**
     * Check if the billing was successful.
     */
    public function wasSuccessful(): bool
    {
        return $this->billingStatus === 'completed' || $this->billingStatus === 'success';
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            createdPurchaseId: (string) $data['created_purchase_id'],
            paymentStatus: (string) $data['payment_status'],
            paymentStatusMsg: (string) $data['payment_status_msg'],
            billingStatus: (string) $data['billing_status'],
            billingStatusMsg: (string) $data['billing_status_msg'],
        );
    }
}
