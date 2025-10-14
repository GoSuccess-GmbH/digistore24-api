<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ServiceProof;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class ListServiceProofRequestsRequest extends AbstractRequest
{
    public function __construct(private ?int $limit = null, private ?int $offset = null) {}
    public function getEndpoint(): string { return 'listServiceProofRequests'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array
    {
        $params = [];
        if ($this->limit !== null) $params['limit'] = $this->limit;
        if ($this->offset !== null) $params['offset'] = $this->offset;
        return $params;
    }
}
