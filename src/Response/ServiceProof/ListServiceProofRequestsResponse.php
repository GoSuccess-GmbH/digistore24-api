<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ServiceProof;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Service Proof Requests Response
 *
 * Response object for the ServiceProof API endpoint.
 */
final class ListServiceProofRequestsResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $serviceProofRequests
     */
    public function __construct(private array $serviceProofRequests)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getServiceProofRequests(): array
    {
        return $this->serviceProofRequests;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $serviceProofRequests = $innerData['service_proof_requests'] ?? [];
        
        if (!is_array($serviceProofRequests)) {
            $serviceProofRequests = [];
        }
        
        /** @var array<string, mixed> $validatedRequests */
        $validatedRequests = $serviceProofRequests;
        
        return new self(serviceProofRequests: $validatedRequests);
    }
}
