<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Create Product Response
 *
 * Response object for the Product API endpoint.
 */
final class CreateProductResponse extends AbstractResponse
{
    public string $result { get => $this->result ?? ''; }

    public int $productId { get => $this->productId ?? 0; }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData(data: $data);
        $productId = $innerData['product_id'] ?? 0;

        $response = new self();
        $response->result = self::extractResult(data: $data, rawResponse: $rawResponse);
        $response->productId = TypeConverter::toInt($productId) ?? 0;
        if ($rawResponse !== null) {
            $response->rawResponse = $rawResponse;
        }

        return $response;
    }
}
