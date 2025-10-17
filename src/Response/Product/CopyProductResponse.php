<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Copy Product Response
 *
 * Response object for the Product API endpoint.
 */
final class CopyProductResponse extends AbstractResponse
{
    public function __construct(private int $productId)
    {
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        $productId = $innerData['product_id'] ?? 0;

        return new self(productId: TypeConverter::toInt($productId) ?? 0);
    }
}
