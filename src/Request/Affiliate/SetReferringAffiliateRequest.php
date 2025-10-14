<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Affiliate;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class SetReferringAffiliateRequest extends AbstractRequest
{
    public function __construct(private string $purchaseId, private string $affiliateId) {}
    public function getEndpoint(): string { return 'setReferringAffiliate'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return ['purchase_id' => $this->purchaseId, 'affiliate_id' => $this->affiliateId];
    }
}
