<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ApiKey;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Unregister Response
 *
 * Response object for revoking an API key.
 */
final class UnregisterResponse extends AbstractResponse
{
    /**
     * Request result status
     */
    public string $result {
        get => $this->result ?? '';
    }

    /**
     * Whether the API key was modified/deleted
     */
    public string $modified {
        get => $this->modified ?? '';
    }

    /**
     * Confirmation message from API
     */
    public ?string $note {
        get => $this->note ?? null;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData(data: $data);

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->modified = is_string($innerData['modified'] ?? null) ? $innerData['modified'] : '';
        $response->note = is_string($innerData['note'] ?? null) ? $innerData['note'] : null;

        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
