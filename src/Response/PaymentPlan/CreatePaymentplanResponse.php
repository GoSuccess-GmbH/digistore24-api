<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\PaymentPlan;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Create Paymentplan Response
 *
 * Response object for the PaymentPlan API endpoint.
 */
final class CreatePaymentplanResponse extends AbstractResponse
{
    public function __construct(private string $result, private array $data)
    {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getPaymentplanId(): ?string
    {
        return $this->data['paymentplan_id'] ?? null;
    }

    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            result: (string)($data['result'] ?? ''),
            data: $data['data'] ?? [],
        );
    }
}
