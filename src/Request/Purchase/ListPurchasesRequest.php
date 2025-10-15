<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * List Purchases Request
 *
 * Lists all purchases/orders in the account.
 */
final class ListPurchasesRequest extends AbstractRequest
{
    public function __construct(
        public readonly ?string $productId = null,
        public readonly ?string $buyerEmail = null,
        public readonly ?\DateTimeInterface $fromDate = null,
        public readonly ?\DateTimeInterface $toDate = null,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/listPurchases';
    }

    public function toArray(): array
    {
        $data = [];

        if ($this->productId !== null) {
            $data['product_id'] = $this->productId;
        }

        if ($this->buyerEmail !== null) {
            $data['buyer_email'] = $this->buyerEmail;
        }

        if ($this->fromDate !== null) {
            $data['from_date'] = $this->fromDate->format('Y-m-d');
        }

        if ($this->toDate !== null) {
            $data['to_date'] = $this->toDate->format('Y-m-d');
        }

        return $data;
    }

    
}
