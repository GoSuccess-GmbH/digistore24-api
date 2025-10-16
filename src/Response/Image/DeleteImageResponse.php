<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Image;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Delete Image Response
 *
 * Response after deleting an image.
 */
final class DeleteImageResponse extends AbstractResponse
{
    public function __construct(
        public readonly bool $success,
        public readonly string $imageId,
        public readonly ?string $message = null,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $success = $data['success'] ?? true;
        $imageId = $data['image_id'] ?? '';
        $message = $data['message'] ?? null;

        $instance = new self(
            success: is_bool($success) ? $success : (bool)$success,
            imageId: is_string($imageId) ? $imageId : '',
            message: $message === null || is_string($message) ? $message : null,
        );

        return $instance;
    }
}
