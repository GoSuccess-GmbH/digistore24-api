<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Image;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Create Image Response
 *
 * Response after successfully creating an image.
 */
final class CreateImageResponse extends AbstractResponse
{
    /**
     * @param string $imageId ID of the created image
     * @param string $imageUrl URL of the created image on Digistore24
     */
    public function __construct(
        public readonly string $imageId,
        public readonly string $imageUrl,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $imageId = self::getValue($data, 'image_id', 'string', '');
        $imageUrl = self::getValue($data, 'image_url', 'string', '');

        $instance = new self(
            imageId: is_string($imageId) ? $imageId : '',
            imageUrl: is_string($imageUrl) ? $imageUrl : '',
        );

        return $instance;
    }
}
