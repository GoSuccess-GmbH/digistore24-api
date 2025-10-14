<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Affiliate;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final readonly class ValidateAffiliateRequest extends AbstractRequest
{
    public function __construct(private string $affiliateId) {}
    public function endpoint(): string { return 'validateAffiliate'; }
    public function method(): Method { return Method::GET; }
    public function toArray(): array { return ['affiliate_id' => $this->affiliateId]; }
}
