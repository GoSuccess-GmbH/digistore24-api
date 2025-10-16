<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Payout;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Stats Expected Payouts Response
 *
 * Response object for the Payout API endpoint.
 */
final class StatsExpectedPayoutsResponse extends AbstractResponse
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(private array $data)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? [];

        if (!is_array($responseData)) {
            $responseData = [];
        }

        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        return new self(data: $validatedData);
    }
}
