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

    public function getUrl(): ?string
    {
        $url = $this->data['url'] ?? null;

        return is_string($url) ? $url : null;
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
