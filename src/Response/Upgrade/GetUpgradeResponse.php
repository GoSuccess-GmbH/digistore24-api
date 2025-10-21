<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Upgrade;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Upgrade Response
 *
 * Response object for the Upgrade API endpoint.
 */
final class GetUpgradeResponse extends AbstractResponse
{
    public string $result { get => $this->result ?? ''; }

    /** @var array<string, mixed> */
    public array $data { get => $this->data ?? []; }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? [];
        if (! is_array($responseData)) {
            $responseData = [];
        }
        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->data = $validatedData;
        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
