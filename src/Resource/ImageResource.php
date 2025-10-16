<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Exception\ApiException;
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
     * Upload a new image
     *
     * Uploads a new image and assigns it to a specific usage context (e.g., product image, logo, etc.).
     *
     * @param CreateImageRequest $request The create image request
     * @throws ApiException
     * @return CreateImageResponse The response with image details
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
     * @throws ApiException
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
     * @param ListImagesRequest|null $request Optional list images request with filters
     * @throws ApiException
     * @return ListImagesResponse The response with image list
     */
    public function list(?ListImagesRequest $request = null): ListImagesResponse
    {
        return $this->executeTyped($request ?? new ListImagesRequest(), ListImagesResponse::class);
    }

    /**
     * Delete an image
     *
     * Deletes an image from Digistore24.
     *
     * @param DeleteImageRequest $request The delete image request
     * @throws ApiException
     * @return DeleteImageResponse The response indicating success
     */
    public function delete(DeleteImageRequest $request): DeleteImageResponse
    {
        return $this->executeTyped($request, DeleteImageResponse::class);
    }
}
