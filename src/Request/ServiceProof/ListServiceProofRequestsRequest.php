<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\ServiceProof;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class ListServiceProofRequestsRequest extends AbstractRequest
{
    public function __construct(private ?int $limit = null, private ?int $offset = null) {}
    public function getEndpoint(): string { return 'listServiceProofRequests'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array
    {
        $params = [];
        if ($this->limit !== null) $params['limit'] = $this->limit;
        if ($this->offset !== null) $params['offset'] = $this->offset;
        return $params;
    }
}
