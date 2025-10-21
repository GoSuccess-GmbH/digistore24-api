<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\ApiKey;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

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
     * The revoked API key ID
     */
    public string $apiKeyId {
        get => $this->apiKeyId ?? '';
    }

    /**
     * Revocation timestamp
     */
    public ?\DateTimeInterface $revokedAt {
        get => $this->revokedAt ?? null;
    }

    /**
     * Confirmation message
     */
    public ?string $message {
        get => $this->message ?? null;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData(data: $data);

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->apiKeyId = is_string($innerData['api_key_id'] ?? null) ? $innerData['api_key_id'] : '';
        $response->revokedAt = TypeConverter::toDateTime($innerData['revoked_at'] ?? null);
        $response->message = is_string($innerData['message'] ?? null) ? $innerData['message'] : null;

        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
