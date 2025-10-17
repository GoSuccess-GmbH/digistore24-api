<?php

declare (strict_types=1);

namespace GoSuccess\Digistore24\Api\DTO;

/**
 * Service Proof Request Update Data Transfer Object
 *
 * Data structure for updating service proof requests.
 * Uses PHP 8.4 property hooks for automatic validation.
 *
 * @link https://digistore24.com/api/docs/paths/updateServiceProofRequest.yaml
 */
final class ServiceProofRequestUpdateData extends \GoSuccess\Digistore24\Api\Base\AbstractDataTransferObject
{
    /**
     * Status of the request - either providing proof or executing the refund
     * Required field
     */
    public string $requestStatus {
        set {
            if (! in_array($value, ['proof_provided', 'exec_refund'], true)) {
                throw new \InvalidArgumentException("Invalid request_status: {$value}. Allowed: proof_provided, exec_refund");
            }
            $this->requestStatus = $value;
        }
    }

    /**
     * Additional message or explanation about the proof or refund decision
     */
    public ?string $message = null;

    /**
     * Array of files that serve as proof of service delivery
     * @var array<FileData>|null
     */
    public ?array $files = null;

    /**
     * Convert to array for API request
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $result = ['data' => ['request_status' => $this->requestStatus]];
        if ($this->message !== null) {
            $result['data']['message'] = $this->message;
        }
        if ($this->files !== null) {
            $result['files'] = array_map(fn (FileData $file) => $file->toArray(), $this->files);
        }

        return $result;
    }
}
