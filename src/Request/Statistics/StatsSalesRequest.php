<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Statistics;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class StatsSalesRequest extends AbstractRequest
{
    public function __construct(private ?string $from = null, private ?string $to = null) {}
    public function getEndpoint(): string { return 'statsSales'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array
    {
        $params = [];
        if ($this->from !== null) $params['from'] = $this->from;
        if ($this->to !== null) $params['to'] = $this->to;
        return $params;
    }
}
