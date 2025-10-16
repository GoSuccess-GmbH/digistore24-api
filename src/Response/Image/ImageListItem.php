<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Image;

use DateTimeImmutable;
use DateTimeInterface;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Image List Item
 *
 * Represents an image in a list.
 */
final class ImageListItem
{
    public function __construct(
        public readonly string $imageId,
        public readonly string $imageUrl,
        public readonly string $name,
        public readonly ?string $usageType,
        public readonly DateTimeInterface $createdAt,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        return new self(
            imageId: $data['image_id'] ?? '',
            imageUrl: $data['image_url'] ?? '',
            name: $data['name'] ?? '',
            usageType: $data['usage_type'] ?? null,
            createdAt: new DateTimeImmutable($data['created_at'] ?? 'now'),
        );
    }
}
