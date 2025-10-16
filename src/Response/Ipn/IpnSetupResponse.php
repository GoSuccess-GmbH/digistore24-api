<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Ipn;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Ipn Setup Response
 *
 * Response object for the Ipn API endpoint.
 */
final class IpnSetupResponse extends AbstractResponse
{
    public function __construct(private string $result, private array $data)
    {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            result: self::extractResult($data, $rawResponse),
            data: $data['data'] ?? [],
        );
    }
}
