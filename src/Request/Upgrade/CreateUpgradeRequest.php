<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Upgrade;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\DTO\UpgradeData;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Create Upgrade Request
 *
 * Creates a new upgrade path between products.
 */
final class CreateUpgradeRequest extends AbstractRequest
{
    /**
     * @param UpgradeData $upgrade The upgrade configuration
     */
    public function __construct(private UpgradeData $upgrade)
    {
    }

    public function getEndpoint(): string
    {
        return '/createUpgrade';
    }

    public function getMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return $this->upgrade->toArray();
    }
}
