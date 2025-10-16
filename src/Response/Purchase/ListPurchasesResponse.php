<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Purchase;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * List Purchases Response
 *
 * Response containing a list of purchases.
 */
final class ListPurchasesResponse extends AbstractResponse
{
    /**
     * @param array<PurchaseListItem> $purchases Array of purchase list items
     * @param int $totalCount Total number of purchases
     */
    public function __construct(
        public readonly array $purchases,
        public readonly int $totalCount,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $purchases = [];

        if (isset($data['purchases']) && is_array($data['purchases'])) {
            foreach ($data['purchases'] as $purchase) {
                $purchases[] = PurchaseListItem::fromArray($purchase);
            }
        }

        $instance = new self(
            purchases: $purchases,
            totalCount: (int)($data['total_count'] ?? count($purchases)),
        );

        return $instance;
    }
}
