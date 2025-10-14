<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Request\Affiliate;
use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;
final class SetAffiliateForEmailRequest extends AbstractRequest
{
    public function __construct(private string $email, private string $affiliateId) {}
    public function getEndpoint(): string { return 'setAffiliateForEmail'; }
    public function method(): Method { return Method::POST; }
    public function toArray(): array
    {
        return ['email' => $this->email, 'affiliate_id' => $this->affiliateId];
    }
}
