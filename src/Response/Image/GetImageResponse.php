<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Image;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get Image Response
 *
 * Response containing image details.
 */
final class GetImageResponse extends AbstractResponse
{
    public function __construct(
        public readonly string $imageId,
        public readonly string $imageUrl,
        public readonly string $name,
        public readonly ?string $usageType,
        public readonly ?string $altTag,
        public readonly \DateTimeInterface $createdAt,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $imageId = $data['image_id'] ?? '';
        $imageUrl = $data['image_url'] ?? '';
        $name = $data['name'] ?? '';
        $usageType = $data['usage_type'] ?? null;
        $altTag = $data['alt_tag'] ?? null;
        $createdAt = $data['created_at'] ?? 'now';

        $instance = new self(
            imageId: is_string($imageId) ? $imageId : '',
            imageUrl: is_string($imageUrl) ? $imageUrl : '',
            name: is_string($name) ? $name : '',
            usageType: $usageType === null || is_string($usageType) ? $usageType : null,
            altTag: $altTag === null || is_string($altTag) ? $altTag : null,
            createdAt: new \DateTimeImmutable(is_string($createdAt) ? $createdAt : 'now'),
        );

        return $instance;
    }
}
