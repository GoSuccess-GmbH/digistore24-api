<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Upgrade;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * List Upgrades Response
 *
 * Response object for the Upgrade API endpoint.
 */
final class ListUpgradesResponse extends AbstractResponse
{
    public function __construct(private array $upgrades)
    {
    }

    public function getUpgrades(): array
    {
        return $this->upgrades;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(upgrades: $data['data']['upgrades'] ?? []);
    }
}
