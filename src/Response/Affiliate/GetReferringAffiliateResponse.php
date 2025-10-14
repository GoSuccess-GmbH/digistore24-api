<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Affiliate;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class GetReferringAffiliateResponse extends AbstractResponse
{
    public function __construct(private ?string $affiliateId) {}
    public function getAffiliateId(): ?string { return $this->affiliateId; }
    public static function fromArray(array $data): self
    {
        return new self(affiliateId: $data['data']['affiliate_id'] ?? null);
    }
}
