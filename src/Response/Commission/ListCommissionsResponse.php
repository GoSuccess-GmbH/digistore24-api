<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Commission;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Response containing list of affiliate commissions.
 *
 * @see https://digistore24.com/api/docs/paths/listCommissions.yaml
 */
final class ListCommissionsResponse extends AbstractResponse
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
    ) {
    }

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
            fn ($sum, $item) => $sum + $item->amount,
            0.0,
        );
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $items = [];
        $itemsData = $data['items'] ?? [];
        if (is_array($itemsData)) {
            foreach ($itemsData as $item) {
                if (!is_array($item)) {
                    continue;
                }

                $id = $item['id'] ?? 0;
                $createdAt = $item['created_at'] ?? '';
                $amount = $item['amount'] ?? 0.0;
                $currency = $item['currency'] ?? '';
                $reason = $item['reason'] ?? '';
                $schedulePayoutAt = $item['schedule_payout_at'] ?? '';
                $transactionId = $item['transaction_id'] ?? 0;
                $purchaseId = $item['purchase_id'] ?? '';

                $items[] = (object)[
                    'id' => is_int($id) ? $id : 0,
                    'created_at' => is_string($createdAt) ? $createdAt : '',
                    'amount' => is_float($amount) ? $amount : (is_numeric($amount) ? (float)$amount : 0.0),
                    'currency' => is_string($currency) ? $currency : '',
                    'reason' => is_string($reason) ? $reason : '',
                    'schedule_payout_at' => is_string($schedulePayoutAt) ? $schedulePayoutAt : '',
                    'transaction_id' => is_int($transactionId) ? $transactionId : 0,
                    'purchase_id' => is_string($purchaseId) ? $purchaseId : '',
                ];
            }
        }

        $pageNo = $data['page_no'] ?? 1;
        $pageSize = $data['page_size'] ?? 0;
        $itemCount = $data['item_count'] ?? 0;
        $pageCount = $data['page_count'] ?? 0;

        return new self(
            pageNo: is_int($pageNo) ? $pageNo : 1,
            pageSize: is_int($pageSize) ? $pageSize : 0,
            itemCount: is_int($itemCount) ? $itemCount : 0,
            pageCount: is_int($pageCount) ? $pageCount : 0,
            items: $items,
        );
    }
}
