<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\OrderForm;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * List Orderforms Response
 *
 * Response object for the OrderForm API endpoint.
 */
final class ListOrderformsResponse extends AbstractResponse
{
    public function __construct(private array $orderforms)
    {
    }

    public function getOrderforms(): array
    {
        return $this->orderforms;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(orderforms: $data['data']['orderforms'] ?? []);
    }
}
