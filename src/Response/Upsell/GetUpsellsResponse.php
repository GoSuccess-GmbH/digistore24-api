<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Upsell;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Upsells Response
 *
 * Response object for the Upsell API endpoint.
 */
final class GetUpsellsResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $upsells
     */
    public function __construct(private array $upsells)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getUpsells(): array
    {
        return $this->upsells;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $upsells = $innerData['upsells'] ?? [];

        if (!is_array($upsells)) {
            $upsells = [];
        }

        /** @var array<string, mixed> $validatedUpsells */
        $validatedUpsells = $upsells;

        return new self(upsells: $validatedUpsells);
    }
}
