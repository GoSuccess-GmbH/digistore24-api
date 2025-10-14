<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * Response from updating a purchase
 *
 * @link https://digistore24.com/api/docs/paths/updatePurchase.yaml OpenAPI Specification
 */
final readonly class UpdatePurchaseResponse extends AbstractResponse
{
    public string $isModified;

    protected function parse(array $data): void
    {
        $this->isModified = $data['data']['is_modified'];
    }

    /**
     * Check if the purchase was successfully modified
     */
    public function wasModified(): bool
    {
        return $this->isModified === 'Y';
    }
}
