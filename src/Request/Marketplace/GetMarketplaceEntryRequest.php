<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Marketplace;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class GetMarketplaceEntryRequest extends AbstractRequest
{
    public function __construct(private string $entryId) {}
    public function getEndpoint(): string { return 'getMarketplaceEntry'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['entry_id' => $this->entryId]; }
}
