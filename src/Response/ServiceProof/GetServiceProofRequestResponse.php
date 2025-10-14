<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\ServiceProof;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class GetServiceProofRequestResponse extends AbstractResponse
{
    public function __construct(private array $serviceProofRequest) {}
    public function getServiceProofRequest(): array { return $this->serviceProofRequest; }
    public static function fromArray(array $data): self
    {
        return new self(serviceProofRequest: $data['data']['service_proof_request'] ?? []);
    }
}
