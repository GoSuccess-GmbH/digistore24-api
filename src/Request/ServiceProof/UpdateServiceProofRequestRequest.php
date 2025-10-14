<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ServiceProof;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class UpdateServiceProofRequestRequest extends AbstractRequest
{
    public function __construct(private string $serviceProofRequestId, private array $data) {}
    public function getEndpoint(): string { return 'updateServiceProofRequest'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return array_merge(['service_proof_request_id' => $this->serviceProofRequestId], $this->data);
    }
}
