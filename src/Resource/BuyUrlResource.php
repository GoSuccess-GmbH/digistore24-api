<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\Api\Request\BuyUrl\ListBuyUrlsRequest;
use GoSuccess\Digistore24\Api\Request\BuyUrl\DeleteBuyUrlRequest;
use GoSuccess\Digistore24\Api\Response\BuyUrl\CreateBuyUrlResponse;
use GoSuccess\Digistore24\Api\Response\BuyUrl\ListBuyUrlsResponse;
use GoSuccess\Digistore24\Api\Response\BuyUrl\DeleteBuyUrlResponse;

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
     * @throws \GoSuccess\Digistore24\Api\Exception\ValidationException If request validation fails
     * @throws \GoSuccess\Digistore24\Api\Exception\AuthenticationException If API key is invalid
     * @throws \GoSuccess\Digistore24\Api\Exception\NotFoundException If product not found
     * @throws \GoSuccess\Digistore24\Api\Exception\RateLimitException If rate limit exceeded
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
     * Retrieves a paginated list of all generated buy URLs.
     * 
     * @param ListBuyUrlsRequest $request The list buy URLs request
     * @return ListBuyUrlsResponse The response with buy URLs list
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @link https://dev.digistore24.com/en/articles/64-listbuyurls
     */
    public function list(ListBuyUrlsRequest $request): ListBuyUrlsResponse
    {
        return $this->executeTyped($request, ListBuyUrlsResponse::class);
    }

    /**
     * Delete a buy URL
     * 
     * Deletes a previously generated buy URL.
     * 
     * @param DeleteBuyUrlRequest $request The delete buy URL request
     * @return DeleteBuyUrlResponse The response confirming deletion
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @link https://dev.digistore24.com/en/articles/28-deletebuyurl
     */
    public function delete(DeleteBuyUrlRequest $request): DeleteBuyUrlResponse
    {
        return $this->executeTyped($request, DeleteBuyUrlResponse::class);
    }
}
