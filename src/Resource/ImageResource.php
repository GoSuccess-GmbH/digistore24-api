<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Image\CreateImageRequest;
use GoSuccess\Digistore24\Api\Request\Image\GetImageRequest;
use GoSuccess\Digistore24\Api\Response\Image\CreateImageResponse;
use GoSuccess\Digistore24\Api\Response\Image\GetImageResponse;

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
     * @return CreateImageResponse The response with image ID and URL
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
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
     * @return GetImageResponse The response with image details
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function get(GetImageRequest $request): GetImageResponse
    {
        return $this->executeTyped($request, GetImageResponse::class);
    }
}
