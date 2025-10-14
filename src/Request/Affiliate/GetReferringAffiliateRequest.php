<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Affiliate;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class GetReferringAffiliateRequest extends AbstractRequest
{
    public function __construct(private string $purchaseId) {}
    public function getEndpoint(): string { return 'getReferringAffiliate'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['purchase_id' => $this->purchaseId]; }
}
