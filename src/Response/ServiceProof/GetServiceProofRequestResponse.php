<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ServiceProof;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Service Proof Request Response
 *
 * Response object for the ServiceProof API endpoint.
 */
final class GetServiceProofRequestResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $serviceProofRequest
     */
    public function __construct(private array $serviceProofRequest)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getServiceProofRequest(): array
    {
        return $this->serviceProofRequest;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $serviceProofRequest = $innerData['service_proof_request'] ?? [];

        if (!is_array($serviceProofRequest)) {
            $serviceProofRequest = [];
        }

        /** @var array<string, mixed> $validatedRequest */
        $validatedRequest = $serviceProofRequest;

        return new self(serviceProofRequest: $validatedRequest);
    }
}
