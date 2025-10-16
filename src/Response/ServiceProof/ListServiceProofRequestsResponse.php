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
    public function __construct(private array $serviceProofRequests)
    {
    }

    public function getServiceProofRequests(): array
    {
        return $this->serviceProofRequests;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(serviceProofRequests: $data['data']['service_proof_requests'] ?? []);
    }
}
