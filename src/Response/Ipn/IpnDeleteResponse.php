<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Ipn;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * IPN Delete Response
 *
 * Response for deleting an IPN connection.
 */
final class IpnDeleteResponse extends AbstractResponse
{
    /**
     * Result status
     */
    public string $result = '' {
        get => $this->result;
    }

    public function __construct(string $result = '')
    {
        $this->result = $result;
    }

    /**
     * Check if deletion was successful
     */
    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $instance = new self(result: self::extractResult($data, $rawResponse));

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
