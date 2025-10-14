<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Affiliate;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class SetReferringAffiliateRequest extends AbstractRequest
{
    public function __construct(private string $purchaseId, private string $affiliateId) {}
    public function getEndpoint(): string { return 'setReferringAffiliate'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return ['purchase_id' => $this->purchaseId, 'affiliate_id' => $this->affiliateId];
    }
}
