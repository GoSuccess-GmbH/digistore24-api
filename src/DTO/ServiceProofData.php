<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Service Proof Data Transfer Object
 *
 * Data structure for service proof request updates.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/updateServiceProofRequest.yaml
 */
final class ServiceProofData
{
    /**
     * Status of the request - either providing proof or executing the refund
     */
    public string $requestStatus {
        set {
            if (! in_array($value, ['proof_provided', 'exec_refund'], true)) {
                throw new \InvalidArgumentException(
                    "Invalid request status: $value. Allowed: proof_provided, exec_refund",
                );
            }
            $this->requestStatus = $value;
        }
    }

    /**
     * Additional message or explanation about the proof or refund decision
     */
    public ?string $message = null;

    /**
     * Create ServiceProofData from array
     *
     * @param array{
     *     request_status: string,
     *     message?: string|null
     * } $data
     */
    public static function fromArray(array $data): self
    {
        $instance = new self();
        $instance->requestStatus = $data['request_status'];
        $instance->message = $data['message'] ?? null;

        return $instance;
    }

    /**
     * Convert to array for API request
     *
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $data = ['request_status' => $this->requestStatus];

        if ($this->message !== null) {
            $data['message'] = $this->message;
        }

        return $data;
    }
}
