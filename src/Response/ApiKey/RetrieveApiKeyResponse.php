<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ApiKey;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Retrieve Api Key Response
 *
 * Response object for the ApiKey API endpoint.
 */
final class RetrieveApiKeyResponse extends AbstractResponse
{
    public function __construct(private string $apiKey)
    {
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $apiKey = $innerData['api_key'] ?? '';

        return new self(apiKey: is_string($apiKey) ? $apiKey : '');
    }
}
