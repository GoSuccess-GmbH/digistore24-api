<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Statistics;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Stats Sales Summary Response
 *
 * Response object for the Statistics API endpoint.
 */
final class StatsSalesSummaryResponse extends AbstractResponse
{
    public function __construct(private array $data)
    {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getSummary(): array
    {
        return $this->data['summary'] ?? [];
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(data: $data['data'] ?? []);
    }
}
