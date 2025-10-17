<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Statistics;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Stats Daily Amounts Response
 *
 * Response object for the Statistics API endpoint.
 */
final class StatsDailyAmountsResponse extends AbstractResponse
{
    /** @param array<string, mixed> $data */
    public function __construct(private array $data)
    {
    }

    /** @return array<string, mixed> */
    public function getData(): array
    {
        return $this->data;
    }

    /** @return array<string, mixed> */
    public function getDailyAmounts(): array
    {
        $dailyAmounts = $this->data['daily_amounts'] ?? [];
        if (! is_array($dailyAmounts)) {
            return [];
        }
        /** @var array<string, mixed> $validated */
        $validated = $dailyAmounts;

        return $validated;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? [];
        if (! is_array($responseData)) {
            $responseData = [];
        }
        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        return new self(data: $validatedData);
    }
}
