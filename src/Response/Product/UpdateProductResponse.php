<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Update Product Response
 *
 * Response object for the Product API endpoint.
 */
final class UpdateProductResponse extends AbstractResponse
{
    public function __construct(private string $modified)
    {
    }

    public function getModified(): string
    {
        return $this->modified;
    }

    public function wasModified(): bool
    {
        return $this->modified === 'Y';
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);
        
return new self(modified: (string)($innerData['modified'] ?? 'N'));
    }
}
