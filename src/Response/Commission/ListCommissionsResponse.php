<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Commission;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Response containing list of affiliate commissions.
 *
 * @see https://digistore24.com/api/docs/paths/listCommissions.yaml
 */
final readonly class ListCommissionsResponse extends AbstractResponse
{
    /**
     * @param int $pageNo Current page number
     * @param int $pageSize Number of items per page
     * @param int $itemCount Total number of items
     * @param int $pageCount Total number of pages
     * @param array<int, object{id: int, created_at: string, amount: float, currency: string, reason: string, schedule_payout_at: string, transaction_id: int, purchase_id: string}> $items Commission items
     */
    public function __construct(
        private int $pageNo,
        private int $pageSize,
        private int $itemCount,
        private int $pageCount,
        private array $items,
    ) {}

    /**
     * Get current page number.
     */
    public function getPageNo(): int
    {
        return $this->pageNo;
    }

    /**
     * Get number of items per page.
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * Get total number of items.
     */
    public function getItemCount(): int
    {
        return $this->itemCount;
    }

    /**
     * Get total number of pages.
     */
    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    /**
     * Get commission items.
     *
     * @return array<int, object{id: int, created_at: string, amount: float, currency: string, reason: string, schedule_payout_at: string, transaction_id: int, purchase_id: string}>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Check if there are more pages.
     */
    public function hasMorePages(): bool
    {
        return $this->pageNo < $this->pageCount;
    }

    /**
     * Get total commission amount.
     */
    public function getTotalAmount(): float
    {
        return array_reduce(
            $this->items,
            fn($sum, $item) => $sum + $item->amount,
            0.0
        );
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data): self
    {
        $items = array_map(
            fn($item) => (object) [
                'id' => (int) $item['id'],
                'created_at' => (string) $item['created_at'],
                'amount' => (float) $item['amount'],
                'currency' => (string) $item['currency'],
                'reason' => (string) $item['reason'],
                'schedule_payout_at' => (string) $item['schedule_payout_at'],
                'transaction_id' => (int) $item['transaction_id'],
                'purchase_id' => (string) $item['purchase_id'],
            ],
            $data['items'] ?? []
        );

        return new self(
            pageNo: (int) ($data['page_no'] ?? 1),
            pageSize: (int) ($data['page_size'] ?? 0),
            itemCount: (int) ($data['item_count'] ?? 0),
            pageCount: (int) ($data['page_count'] ?? 0),
            items: $items,
        );
    }
}
