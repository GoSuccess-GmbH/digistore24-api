<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Image;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Delete Image Request
 *
 * Deletes an image from Digistore24.
 */
final class DeleteImageRequest extends AbstractRequest
{
    public function __construct(
        public readonly string $imageId,
    ) {
    }

    public function endpoint(): string
    {
        return '/deleteImage';
    }

    public function toArray(): array
    {
        return [
            'image_id' => $this->imageId,
        ];
    }

    public function validate(): array
    {
        return [];
    }
}
