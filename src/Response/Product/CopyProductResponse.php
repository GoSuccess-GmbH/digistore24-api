<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

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
        return new self(productId: (int)($data['data']['product_id'] ?? 0));
    }
}
