<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\CustomForm;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Response containing custom form records.
 *
 * @see https://digistore24.com/api/docs/paths/listCustomFormRecords.yaml
 */
final class ListCustomFormRecordsResponse extends AbstractResponse
{
    /**
     * @param array<int, object{form_id: int, id: int, purchase_id: string, purchase_item_id: int, product_id: int, form_no: int, form_count: int, data: array<string, string>, address: array<string, string>}> $records
     */
    public function __construct(
        private array $records,
    ) {
    }

    /**
     * Get all custom form records.
     *
     * @return array<int, object{form_id: int, id: int, purchase_id: string, purchase_item_id: int, product_id: int, form_no: int, form_count: int, data: array<string, string>, address: array<string, string>}>
     */
    public function getRecords(): array
    {
        return $this->records;
    }

    /**
     * Get records for a specific purchase.
     *
     * @param string $purchaseId
     * @return array<int, object{form_id: int, id: int, purchase_id: string, purchase_item_id: int, product_id: int, form_no: int, form_count: int, data: array<string, string>, address: array<string, string>}>
     */
    public function getRecordsByPurchaseId(string $purchaseId): array
    {
        return array_filter(
            $this->records,
            fn ($record) => $record->purchase_id === $purchaseId,
        );
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $records = array_map(
            fn ($item) => (object)[
                'form_id' => (int)$item['form_id'],
                'id' => (int)$item['id'],
                'purchase_id' => (string)$item['purchase_id'],
                'purchase_item_id' => (int)$item['purchase_item_id'],
                'product_id' => (int)$item['product_id'],
                'form_no' => (int)$item['form_no'],
                'form_count' => (int)$item['form_count'],
                'data' => (array)($item['data'] ?? []),
                'address' => (array)($item['address'] ?? []),
            ],
            $data['records'] ?? [],
        );

        return new self($records);
    }
}
