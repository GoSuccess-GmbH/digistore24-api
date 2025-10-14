<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\ConversionTool;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class ListConversionToolsRequest extends AbstractRequest
{
    public function __construct(private string $type) {}
    public function getEndpoint(): string { return 'listConversionTools'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['type' => $this->type]; }
}
