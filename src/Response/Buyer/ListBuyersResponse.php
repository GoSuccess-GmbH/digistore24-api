<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Buyer;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\DTO\BuyerData;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * List Buyers Response
 *
 * Response for paginated list of buyers.
 * Contains pagination information and array of BuyerData objects.
 */
final class ListBuyersResponse extends AbstractResponse
{
    /**
     * Current page number
     */
    public int $pageNo = 1 {
        get => $this->pageNo;
    }

    /**
     * Number of items per page
     */
    public int $pageSize = 100 {
        get => $this->pageSize;
    }

    /**
     * Total number of items
     */
    public int $itemCount = 0 {
        get => $this->itemCount;
    }

    /**
     * Total number of pages
     */
    public int $pageCount = 0 {
        get => $this->pageCount;
    }

    /**
     * Array of buyers
     *
     * @var array<int, BuyerData>
     */
    public array $items = [] {
        get => $this->items;
    }

    /**
     * @param array<int, BuyerData> $items
     */
    public function __construct(
        int $pageNo = 1,
        int $pageSize = 100,
        int $itemCount = 0,
        int $pageCount = 0,
        array $items = [],
    ) {
        $this->pageNo = $pageNo;
        $this->pageSize = $pageSize;
        $this->itemCount = $itemCount;
        $this->pageCount = $pageCount;
        $this->items = $items;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $responseData = $data['data'] ?? $data;

        if (! is_array($responseData)) {
            $responseData = [];
        }

        /** @var array<string, mixed> $validatedData */
        $validatedData = $responseData;

        $itemsData = $validatedData['items'] ?? [];
        if (! is_array($itemsData)) {
            $itemsData = [];
        }

        /** @var array<int, BuyerData> $items */
        $items = array_values(array_map(
            function (mixed $item): BuyerData {
                if (! is_array($item)) {
                    return new BuyerData();
                }

                /** @var array<string, mixed> $itemData */
                $itemData = $item;

                return BuyerData::fromArray($itemData);
            },
            $itemsData,
        ));

        $instance = new self(
            pageNo: TypeConverter::toInt($validatedData['page_no'] ?? null) ?? 1,
            pageSize: TypeConverter::toInt($validatedData['page_size'] ?? null) ?? 100,
            itemCount: TypeConverter::toInt($validatedData['item_count'] ?? null) ?? 0,
            pageCount: TypeConverter::toInt($validatedData['page_count'] ?? null) ?? 0,
            items: $items,
        );

        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }

        return $instance;
    }
}
