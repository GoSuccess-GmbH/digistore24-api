<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Ipn;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Ipn Info Response
 *
 * Response object for the Ipn API endpoint.
 */
final class IpnInfoResponse extends AbstractResponse
{
    public function __construct(private array $data)
    {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getUrl(): ?string
    {
        return $this->data['url'] ?? null;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(data: $data['data'] ?? []);
    }
}
