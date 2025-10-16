<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\SmartUpgrade;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * List Smart Upgrades Response
 *
 * Response object for the SmartUpgrade API endpoint.
 */
final class ListSmartUpgradesResponse extends AbstractResponse
{
    public function __construct(private array $smartupgrades)
    {
    }

    public function getSmartupgrades(): array
    {
        return $this->smartupgrades;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(smartupgrades: $data['smartupgrades'] ?? []);
    }
}
