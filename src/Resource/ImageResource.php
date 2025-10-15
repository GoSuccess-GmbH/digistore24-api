<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Image\CreateImageRequest;
use GoSuccess\Digistore24\Api\Request\Image\DeleteImageRequest;
use GoSuccess\Digistore24\Api\Request\Image\GetImageRequest;
use GoSuccess\Digistore24\Api\Request\Image\ListImagesRequest;
use GoSuccess\Digistore24\Api\Response\Image\CreateImageResponse;
use GoSuccess\Digistore24\Api\Response\Image\DeleteImageResponse;
use GoSuccess\Digistore24\Api\Response\Image\GetImageResponse;
use GoSuccess\Digistore24\Api\Response\Image\ListImagesResponse;

/**
 * Image Resource
 *
 * Handles operations for managing images on Digistore24.
 */
final class ImageResource extends AbstractResource
{
    /**
     * Create an image
     *
     * Creates an image on Digistore24 by copying from a provided URL.
     *
     * @param CreateImageRequest $request The create image request
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @return CreateImageResponse The response with image ID and URL
     */
    public function create(CreateImageRequest $request): CreateImageResponse
    {
        return $this->executeTyped($request, CreateImageResponse::class);
    }

    /**
     * Get image details
     *
     * Retrieves detailed information about a specific image by its ID.
     *
     * @param GetImageRequest $request The get image request
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @return GetImageResponse The response with image details
     */
    public function get(GetImageRequest $request): GetImageResponse
    {
        return $this->executeTyped($request, GetImageResponse::class);
    }

    /**
     * List all images
     *
     * Retrieves a list of all images, optionally filtered by usage type.
     *
     * @param ListImagesRequest $request The list images request
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @return ListImagesResponse The response with image list
     */
    public function list(ListImagesRequest $request): ListImagesResponse
    {
        return $this->executeTyped($request, ListImagesResponse::class);
    }

    /**
     * Delete an image
     *
     * Deletes an image from Digistore24.
     *
     * @param DeleteImageRequest $request The delete image request
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @return DeleteImageResponse The response indicating success
     */
    public function delete(DeleteImageRequest $request): DeleteImageResponse
    {
        return $this->executeTyped($request, DeleteImageResponse::class);
    }
}
