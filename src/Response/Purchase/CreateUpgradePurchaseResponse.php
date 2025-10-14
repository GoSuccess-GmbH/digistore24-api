<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Create Upgrade Purchase Response
 *
 * Response object for the Purchase API endpoint.
 */
final readonly class CreateUpgradePurchaseResponse extends AbstractResponse
{
    public function __construct(private array $data)
    {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getNewPurchase(): ?array
    {
        return $this->data['new_purchase'] ?? null;
    }

    public function getUpgradeInfo(): ?array
    {
        return $this->data['upgrade_info'] ?? null;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(data: $data['data'] ?? []);
    }
}
