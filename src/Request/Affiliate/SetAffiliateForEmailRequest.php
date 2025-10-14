<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Request\Affiliate;
use GoSuccess\Digistore24\Base\AbstractRequest;
use GoSuccess\Digistore24\Http\Method;
final readonly class SetAffiliateForEmailRequest extends AbstractRequest
{
    public function __construct(private string $email, private string $affiliateId) {}
    public function getEndpoint(): string { return 'setAffiliateForEmail'; }
    public function getMethod(): Method { return Method::POST; }
    public function getParameters(): array
    {
        return ['email' => $this->email, 'affiliate_id' => $this->affiliateId];
    }
}
