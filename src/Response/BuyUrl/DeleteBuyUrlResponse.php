<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Delete Buy URL Response
 *
 * Response object for the deleteBuyUrl API endpoint.
 * Indicates successful deletion of a BuyUrl.
 */
final class DeleteBuyUrlResponse extends AbstractResponse
{
    /**
     * Result of the delete operation
     */
    public string $result {
        get => $this->result;
    }

    /**
     * Create response from API data
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $instance = new self();

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        $instance->result = self::extractResult(data: $data, rawResponse: $rawResponse);

        return $instance;
    }
}
