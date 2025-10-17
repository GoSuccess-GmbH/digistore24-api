<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\OrderForm;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Orderforms Response
 *
 * Response object for the OrderForm API endpoint.
 */
final class ListOrderformsResponse extends AbstractResponse
{
    /** @param array<string, mixed> $orderforms */
    public function __construct(private array $orderforms)
    {
    }

    /** @return array<string, mixed> */
    public function getOrderforms(): array
    {
        return $this->orderforms;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $orderformsData = $innerData['orderforms'] ?? [];
        if (! is_array($orderformsData)) {
            $orderformsData = [];
        }
        /** @var array<string, mixed> $validatedOrderforms */
        $validatedOrderforms = $orderformsData;

        return new self(orderforms: $validatedOrderforms);
    }
}
