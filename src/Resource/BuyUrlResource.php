<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\Api\Response\BuyUrl\CreateBuyUrlResponse;

/**
 * Buy URL Resource
 * 
 * Manage buy URLs (customized order form links).
 * 
 * @link https://digistore24.com/api/docs/tags/buyUrl
 */
final class BuyUrlResource extends AbstractResource
{
    /**
     * Create a customized buy URL
     * 
     * Creates a personalized order form URL with pre-filled buyer data,
     * custom payment plans, tracking parameters, and more.
     * 
     * @link https://digistore24.com/api/docs/paths/createBuyUrl.yaml
     * 
     * @param CreateBuyUrlRequest $request Request with product ID and optional parameters
     * @return CreateBuyUrlResponse Response containing the buy URL and metadata
     * 
     * @throws \GoSuccess\Digistore24\Exception\ValidationException If request validation fails
     * @throws \GoSuccess\Digistore24\Exception\AuthenticationException If API key is invalid
     * @throws \GoSuccess\Digistore24\Exception\NotFoundException If product not found
     * @throws \GoSuccess\Digistore24\Exception\RateLimitException If rate limit exceeded
     * 
     * @example
     * ```php
     * $request = new CreateBuyUrlRequest(productId: 12345);
     * $request->buyer = new BuyerData();
     * $request->buyer->email = 'customer@example.com';
     * $request->buyer->firstName = 'John';
     * $request->validUntil = '48h';
     * 
     * $response = $client->buyUrls->create($request);
     * echo "Buy URL: {$response->url}\n";
     * echo "Valid until: {$response->validUntil->format('Y-m-d H:i:s')}\n";
     * ```
     */
    public function create(CreateBuyUrlRequest $request): CreateBuyUrlResponse
    {
        return $this->executeTyped($request, CreateBuyUrlResponse::class);
    }

    /**
     * List all buy URLs
     * 
     * TODO: Implement when listBuyUrl endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/listBuyUrl.yaml
     */
    // public function list(ListBuyUrlRequest $request): ListBuyUrlResponse
    // {
    //     return $this->executeTyped($request, ListBuyUrlResponse::class);
    // }

    /**
     * Delete a buy URL
     * 
     * TODO: Implement when deleteBuyUrl endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/deleteBuyUrl.yaml
     */
    // public function delete(DeleteBuyUrlRequest $request): DeleteBuyUrlResponse
    // {
    //     return $this->executeTyped($request, DeleteBuyUrlResponse::class);
    // }
}
