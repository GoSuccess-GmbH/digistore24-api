<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\SmartUpgrade;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Smartupgrade Response
 *
 * Response object for the SmartUpgrade API endpoint.
 */
final class GetSmartupgradeResponse extends AbstractResponse
{
    public string $result {
        get => $this->result ?? '';
    }

    /**
     * @var array<string, mixed>
     */
    public array $data {
        get => $this->data ?? [];
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData(data: $data);

        /** @var array<string, mixed> $validatedData */
        $validatedData = $innerData;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->data = $validatedData;

        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
