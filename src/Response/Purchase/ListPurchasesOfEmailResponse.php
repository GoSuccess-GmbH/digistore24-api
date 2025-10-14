<?php

declare(strict_types=1);

namespace Digistore24\Response\Purchase;

use Digistore24\Base\AbstractResponse;

/**
 * Purchase item in email list
 */
final readonly class PurchaseListItem
{
    public function __construct(
        public string $id,
        public string $createdAt,
        public float $amount,
        public string $currency,
        public string $status,
    ) {
    }
}

/**
 * Response from listing purchases by email
 *
 * @link https://digistore24.com/api/docs/paths/listPurchasesOfEmail.yaml OpenAPI Specification
 */
final readonly class ListPurchasesOfEmailResponse extends AbstractResponse
{
    /** @var PurchaseListItem[] */
    public array $purchases;

    protected function parse(array $data): void
    {
        $purchases = [];
        foreach ($data as $item) {
            $purchases[] = new PurchaseListItem(
                id: (string)$item['id'],
                createdAt: (string)$item['created_at'],
                amount: (float)$item['amount'],
                currency: (string)$item['currency'],
                status: (string)$item['status'],
            );
        }
        $this->purchases = $purchases;
    }
}
