<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Util\TypeConverter;

/**
 * Buy URL List Item
 *
 * Represents a single buy URL in the list.
 */
final readonly class BuyUrlListItem
{
    /**
     * @param int $id Buy URL ID
     * @param int|null $productId Associated product ID
     * @param string $url Generated order URL
     * @param \DateTimeInterface|null $createdAt Creation timestamp
     * @param \DateTimeInterface|null $modifiedAt Last modification timestamp
     */
    public function __construct(
        public int $id,
        public ?int $productId = null,
        public string $url = '',
        public ?\DateTimeInterface $createdAt = null,
        public ?\DateTimeInterface $modifiedAt = null,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $id = TypeConverter::toInt($data['id']);
        $productId = TypeConverter::toInt($data['product_id'] ?? null);
        $url = $data['url'] ?? '';
        $createdAt = TypeConverter::toDateTime($data['created_at'] ?? null);
        $modifiedAt = TypeConverter::toDateTime($data['modified_at'] ?? null);

        return new self(
            id: is_int($id) ? $id : 0,
            productId: is_int($productId) ? $productId : null,
            url: is_string($url) ? $url : '',
            createdAt: $createdAt,
            modifiedAt: $modifiedAt,
        );
    }
}

/**
 * List Buy URLs Response
 *
 * Contains a list of buy URLs.
 */
final class ListBuyUrlsResponse extends AbstractResponse
{
    /**
     * @param array<BuyUrlListItem> $items List of buy URLs
     */
    public function __construct(
        public array $items,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $items = [];
        if (isset($data['items']) && is_array($data['items'])) {
            foreach ($data['items'] as $itemData) {
                if (! is_array($itemData)) {
                    continue;
                }
                /** @var array<string, mixed> $validatedItemData */
                $validatedItemData = $itemData;
                $items[] = BuyUrlListItem::fromArray($validatedItemData);
            }
        }

        return new self(items: $items);
    }
}
