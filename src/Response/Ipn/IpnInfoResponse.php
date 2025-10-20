<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Ipn;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * IPN Info Response
 *
 * Response containing IPN connection settings.
 * Returns the settings that were transferred when the connection was created.
 */
final class IpnInfoResponse extends AbstractResponse
{
    /**
     * IPN connection settings
     *
     * @var array<string, mixed>
     */
    public array $data = [] {
        get => $this->data;
    }

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Get IPN URL
     */
    public function getUrl(): ?string
    {
        $url = $this->data['url'] ?? null;

        return is_string($url) ? $url : null;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        // Extract inner data (handles both direct calls and fromResponse calls)
        $responseData = self::extractInnerData($data);

        $instance = new self(data: $responseData);

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
