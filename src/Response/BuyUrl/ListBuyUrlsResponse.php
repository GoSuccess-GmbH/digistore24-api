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

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            id: TypeConverter::toInt($data['id']) ?? 0,
            productId: TypeConverter::toInt($data['product_id'] ?? null),
            url: (string)($data['url'] ?? ''),
            createdAt: TypeConverter::toDateTime($data['created_at'] ?? null),
            modifiedAt: TypeConverter::toDateTime($data['modified_at'] ?? null),
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
                $items[] = BuyUrlListItem::fromArray($itemData);
            }
        }

        return new self(items: $items);
    }
}
