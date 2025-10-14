<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\BuyUrl;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
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
     * @param \DateTimeInterface|null $createdAt Creation timestamp
     * @param \DateTimeInterface|null $validFrom Valid from date
     * @param \DateTimeInterface|null $validUntil Expiration date
     * @param string|null $productId Associated product ID
     * @param string $url Generated order URL
     * @param string|null $email Pre-filled buyer email
     */
    public function __construct(
        public int $id,
        public ?\DateTimeInterface $createdAt = null,
        public ?\DateTimeInterface $validFrom = null,
        public ?\DateTimeInterface $validUntil = null,
        public ?string $productId = null,
        public string $url = '',
        public ?string $email = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: TypeConverter::toInt($data['id']) ?? 0,
            createdAt: TypeConverter::toDateTime($data['created_at'] ?? null),
            validFrom: TypeConverter::toDateTime($data['valid_from'] ?? null),
            validUntil: TypeConverter::toDateTime($data['valid_until'] ?? null),
            productId: isset($data['product_id']) ? (string) $data['product_id'] : null,
            url: (string) ($data['url'] ?? ''),
            email: isset($data['email']) ? (string) $data['email'] : null,
        );
    }
}

/**
 * List Buy URLs Response
 * 
 * Contains a paginated list of buy URLs.
 */
final readonly class ListBuyUrlsResponse extends AbstractResponse
{
    /**
     * @param array<BuyUrlListItem> $buyUrls List of buy URLs
     * @param int $totalCount Total number of buy URLs
     */
    public function __construct(
        public array $buyUrls,
        public int $totalCount = 0,
    ) {}

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        $buyUrls = [];
        if (isset($data['buyurls']) && is_array($data['buyurls'])) {
            foreach ($data['buyurls'] as $buyUrlData) {
                $buyUrls[] = BuyUrlListItem::fromArray($buyUrlData);
            }
        }

        return new self(
            buyUrls: $buyUrls,
            totalCount: TypeConverter::toInt($data['total_count'] ?? null) ?? count($buyUrls),
        );
    }
}
