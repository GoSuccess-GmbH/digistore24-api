<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\OrderForm;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Orderform Response
 *
 * Response object for the OrderForm API endpoint.
 */
final class GetOrderformResponse extends AbstractResponse
{
    public function __construct(private array $data)
    {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(data: $data['data'] ?? []);
    }
}
