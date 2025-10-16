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
    public function __construct(private array $serviceProofRequest)
    {
    }

    public function getServiceProofRequest(): array
    {
        return $this->serviceProofRequest;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        
return new self(serviceProofRequest: $innerData['service_proof_request'] ?? []);
    }
}
