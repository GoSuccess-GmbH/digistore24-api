<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Affiliate;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class GetAffiliateCommissionResponse extends AbstractResponse
{
    public function __construct(private array $commission) {}
    public function getCommission(): array { return $this->commission; }
    public static function fromArray(array $data): self
    {
        return new self(commission: $data['data']['commission'] ?? []);
    }
}
