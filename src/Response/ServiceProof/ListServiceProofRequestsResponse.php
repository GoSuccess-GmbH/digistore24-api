<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\ServiceProof;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListServiceProofRequestsResponse extends AbstractResponse
{
    public function __construct(private array $serviceProofRequests) {}
    public function getServiceProofRequests(): array { return $this->serviceProofRequests; }
    public static function fromArray(array $data): self
    {
        return new self(serviceProofRequests: $data['data']['service_proof_requests'] ?? []);
    }
}
