<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\AccountAccess;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Log Member Access Response
 *
 * Response after successfully logging member access.
 */
final class LogMemberAccessResponse extends AbstractResponse
{
    /**
     * Result status
     */
    public string $result {
        get => $this->result ?? '';
    }

    /**
     * Whether the access was successfully logged
     */
    public bool $success {
        get => $this->success ?? true;
    }

    /**
     * Optional message from the API
     */
    public ?string $message {
        get => $this->message ?? null;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData(data: $data);

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->success = TypeConverter::toBool($innerData['success'] ?? true) ?? true;
        $response->message = isset($innerData['message']) ? TypeConverter::toString($innerData['message']) : null;

        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
