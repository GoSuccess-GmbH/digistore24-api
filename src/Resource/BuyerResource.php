<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;

/**
 * Buyer Resource
 * 
 * Retrieve buyer/customer information.
 * 
 * @link https://digistore24.com/api/docs/tags/buyer
 */
final class BuyerResource extends AbstractResource
{
    /**
     * Get buyer information
     * 
     * TODO: Implement when getBuyer endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/getBuyer.yaml
     * 
     * @example
     * ```php
     * $request = new GetBuyerRequest(buyerId: 'buyer123');
     * $buyer = $client->buyers->get($request);
     * echo "Email: {$buyer->email}\n";
     * ```
     */
    // public function get(GetBuyerRequest $request): GetBuyerResponse
    // {
    //     return $this->executeTyped($request, GetBuyerResponse::class);
    // }
}
