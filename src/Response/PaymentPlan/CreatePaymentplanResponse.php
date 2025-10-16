<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\PaymentPlan;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Create Paymentplan Response
 *
 * Response object for the PaymentPlan API endpoint.
 */
final class CreatePaymentplanResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(private string $result, private array $data)
    {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function getPaymentplanId(): ?string
    {
        $id = $this->data['paymentplan_id'] ?? null;
        return is_string($id) ? $id : null;
    }

    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? [];
        
        if (!is_array($responseData)) {
            $responseData = [];
        }
        
        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;
        
        return new self(
            result: self::extractResult($data, $rawResponse),
            data: $validatedData,
        );
    }
}
