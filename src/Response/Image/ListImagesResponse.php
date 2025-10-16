<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Image;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

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
                if (is_array($image)) {
                    /** @var array<string, mixed> $validatedImage */
                    $validatedImage = $image;
                    $images[] = ImageListItem::fromArray($validatedImage);
                }
            }
        }

        $totalCount = $data['total_count'] ?? count($images);

        $instance = new self(
            images: $images,
            totalCount: is_int($totalCount) ? $totalCount : count($images),
        );

        return $instance;
    }
}
