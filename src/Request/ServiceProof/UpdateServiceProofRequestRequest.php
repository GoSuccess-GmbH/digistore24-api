<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\ServiceProof;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class UpdateServiceProofRequestRequest extends AbstractRequest
{
    public function __construct(private string $serviceProofRequestId, private array $data) {}
    public function getEndpoint(): string { return 'updateServiceProofRequest'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return array_merge(['service_proof_request_id' => $this->serviceProofRequestId], $this->data);
    }
}
