<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Response\Payout;
use GoSuccess\Digistore24\Base\AbstractResponse;
final readonly class ListPayoutsResponse extends AbstractResponse
{
    public function __construct(private array $payoutList) {}
    public function getPayoutList(): array { return $this->payoutList; }
    public static function fromArray(array $data): self
    {
        return new self(payoutList: $data['data']['payout_list'] ?? []);
    }
}
