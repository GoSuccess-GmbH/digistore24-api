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
        $instance = new self(
            imageId: $data['image_id'] ?? '',
            imageUrl: $data['image_url'] ?? '',
            name: $data['name'] ?? '',
            usageType: $data['usage_type'] ?? null,
            altTag: $data['alt_tag'] ?? null,
            createdAt: new \DateTimeImmutable($data['created_at'] ?? 'now'),
        );
        
        if ($rawResponse !== null) {
            $instance->rawResponse = $rawResponse;
        }
        
        return $instance;
    }
}
