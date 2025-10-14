<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Response\Upsell;
use GoSuccess\Digistore24\Api\Base\AbstractResponse;
final readonly class GetUpsellsResponse extends AbstractResponse
{
    public function __construct(private array $upsells) {}
    public function getUpsells(): array { return $this->upsells; }
    public static function fromArray(array $data): self
    {
        return new self(upsells: $data['data']['upsells'] ?? []);
    }
}
