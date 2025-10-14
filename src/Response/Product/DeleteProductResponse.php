<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Product;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Delete Product Response
 *
 * Response object for the Product API endpoint.
 */
final class DeleteProductResponse extends AbstractResponse
{
    public function __construct(private bool $success = true)
    {
    }

    public function getSuccess(): bool
    {
        return $this->success;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(success: true);
    }
}
