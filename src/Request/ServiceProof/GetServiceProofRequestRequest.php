<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ServiceProof;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class GetServiceProofRequestRequest extends AbstractRequest
{
    public function __construct(private string $serviceProofRequestId) {}
    public function getEndpoint(): string { return 'getServiceProofRequest'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['service_proof_request_id' => $this->serviceProofRequestId]; }
}
