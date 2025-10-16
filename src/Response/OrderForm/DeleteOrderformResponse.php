<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\OrderForm;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Delete Orderform Response
 *
 * Response object for the OrderForm API endpoint.
 */
final class DeleteOrderformResponse extends AbstractResponse
{
    public function __construct(private string $result)
    {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function wasSuccessful(): bool
    {
        return $this->result === 'success';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(result: self::extractResult($data, $rawResponse));
    }
}
