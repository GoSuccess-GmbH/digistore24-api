<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Image;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
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
        public readonly \DateTimeInterface $createdAt,
    ) {
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            imageId: $data['image_id'] ?? '',
            imageUrl: $data['image_url'] ?? '',
            name: $data['name'] ?? '',
            usageType: $data['usage_type'] ?? null,
            createdAt: new \DateTimeImmutable($data['created_at'] ?? 'now'),
        );
    }
}

/**
 * List Images Response
 *
 * Response containing a list of images.
 */
final class ListImagesResponse extends AbstractResponse
{
    /**
     * @param array<ImageListItem> $images Array of image list items
     * @param int $totalCount Total number of images
     */
    public function __construct(
        public readonly array $images,
        public readonly int $totalCount,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $images = [];

        if (isset($data['images']) && is_array($data['images'])) {
            foreach ($data['images'] as $image) {
                $images[] = ImageListItem::fromArray($image);
            }
        }

        $instance = new self(
            images: $images,
            totalCount: (int) ($data['total_count'] ?? count($images)),
        );
        
        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }
        
        return $instance;
    }
}
