<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * List Purchases Of Email Response
 *
 * Response object for the Purchase API endpoint.
 */
final readonly class ListPurchasesOfEmailResponse extends AbstractResponse
{
    /**
     * @param array<int, array<string, mixed>> $purchases
     */
    public function __construct(private array $purchases)
    {
    }

    public function getPurchases(): array
    {
        return $this->purchases;
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(purchases: $data['data'] ?? []);
    }
}
