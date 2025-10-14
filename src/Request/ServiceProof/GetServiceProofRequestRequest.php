<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\ServiceProof;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetServiceProofRequestRequest extends AbstractRequest
{
    public function __construct(private string $serviceProofRequestId) {}
    public function getEndpoint(): string { return 'getServiceProofRequest'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['service_proof_request_id' => $this->serviceProofRequestId]; }
}
