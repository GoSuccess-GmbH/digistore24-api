<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Update Purchase Response
 *
 * Response object for the Purchase API endpoint.
 */
final class UpdatePurchaseResponse extends AbstractResponse
{
    public function __construct(private string $isModified)
    {
    }

    public function getIsModified(): string
    {
        return $this->isModified;
    }

    public function wasModified(): bool
    {
        return $this->isModified === 'Y';
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(isModified: (string) ($data['data']['is_modified'] ?? 'N'));
    }
}
