<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Affiliate;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class ValidateAffiliateRequest extends AbstractRequest
{
    public function __construct(private string $affiliateId) {}
    public function getEndpoint(): string { return 'validateAffiliate'; }
    public function getMethod(): Method { return Method::GET; }
    public function getParameters(): array { return ['affiliate_id' => $this->affiliateId]; }
}
