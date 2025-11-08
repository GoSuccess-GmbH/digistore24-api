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

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $imageId = $data['image_id'] ?? '';
        $imageUrl = $data['image_url'] ?? '';
        $name = $data['name'] ?? '';
        $usageType = $data['usage_type'] ?? null;
        $createdAt = $data['created_at'] ?? 'now';

        return new self(
            imageId: is_string($imageId) ? $imageId : '',
            imageUrl: is_string($imageUrl) ? $imageUrl : '',
            name: is_string($name) ? $name : '',
            usageType: $usageType === null || is_string($usageType) ? $usageType : null,
            createdAt: new DateTimeImmutable(is_string($createdAt) ? $createdAt : 'now'),
        );
    }
}
