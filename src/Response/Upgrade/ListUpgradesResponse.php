<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Upgrade;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Upgrades Response
 *
 * Response object for the Upgrade API endpoint.
 */
final class ListUpgradesResponse extends AbstractResponse
{
    /** @param array<string, mixed> $upgrades */
    public function __construct(private array $upgrades)
    {
    }

    /** @return array<string, mixed> */
    public function getUpgrades(): array
    {
        return $this->upgrades;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $upgradesData = $innerData['upgrades'] ?? [];
        if (!is_array($upgradesData)) {
            $upgradesData = [];
        }
        /** @var array<string, mixed> $validatedUpgrades */
        $validatedUpgrades = $upgradesData;

        return new self(upgrades: $validatedUpgrades);
    }
}
