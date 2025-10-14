<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Statistics;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class StatsAffiliateToplistRequest extends AbstractRequest
{
    public function __construct(
        private ?string $from = null,
        private ?string $to = null,
        private ?int $limit = null,
    ) {}
    public function getEndpoint(): string { return 'statsAffiliateToplist'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array
    {
        $params = [];
        if ($this->from !== null) $params['from'] = $this->from;
        if ($this->to !== null) $params['to'] = $this->to;
        if ($this->limit !== null) $params['limit'] = $this->limit;
        return $params;
    }
}
