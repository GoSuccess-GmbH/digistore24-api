<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Ipn;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * IPN Setup Response
 *
 * Response for creating an IPN connection.
 */
final class IpnSetupResponse extends AbstractResponse
{
    /**
     * Result status
     */
    public string $result = '' {
        get => $this->result;
    }

    /**
     * Response data containing setup details
     *
     * @var array<string, mixed>
     */
    public array $data = [] {
        get => $this->data;
    }

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(string $result = '', array $data = [])
    {
        $this->result = $result;
        $this->data = $data;
    }

    /**
     * Check if setup was successful
     */
    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        // Extract inner data (handles both direct calls and fromResponse calls)
        $responseData = self::extractInnerData($data);

        $instance = new self(
            result: self::extractResult($data, $rawResponse),
            data: $responseData,
        );

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
