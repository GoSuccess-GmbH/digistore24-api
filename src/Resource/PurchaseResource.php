<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Purchase\CreateAddonChangePurchaseRequest;
use GoSuccess\Digistore24\Api\Request\Purchase\GetPurchaseRequest;
use GoSuccess\Digistore24\Api\Request\Purchase\ListPurchasesRequest;
use GoSuccess\Digistore24\Api\Response\Purchase\CreateAddonChangePurchaseResponse;
use GoSuccess\Digistore24\Api\Response\Purchase\GetPurchaseResponse;
use GoSuccess\Digistore24\Api\Response\Purchase\ListPurchasesResponse;

/**
 * Purchase Resource
 * 
 * Retrieve and manage purchase information.
 * 
 * @link https://digistore24.com/api/docs/tags/purchase
 */
final class PurchaseResource extends AbstractResource
{
    /**
     * Create addon change purchase
     * 
     * Creates a package change order to add or remove products from an order.
     * The main product's quantity cannot be changed. Added products must be subscriptions.
     * Requires "Billing on demand" right to be enabled for the vendor account.
     * 
     * @param CreateAddonChangePurchaseRequest $request The addon change request
     * @return CreateAddonChangePurchaseResponse The response
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @link https://digistore24.com/api/docs/paths/createAddonChangePurchase.yaml
     */
    public function createAddonChange(CreateAddonChangePurchaseRequest $request): CreateAddonChangePurchaseResponse
    {
        return $this->executeTyped($request, CreateAddonChangePurchaseResponse::class);
    }

    /**
     * Get purchase details
     * 
     * Retrieves detailed information about a specific purchase/order.
     * 
     * @param GetPurchaseRequest $request The get purchase request
     * @return GetPurchaseResponse The response with purchase details
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @link https://digistore24.com/api/docs/paths/getPurchase.yaml
     */
    public function get(GetPurchaseRequest $request): GetPurchaseResponse
    {
        return $this->executeTyped($request, GetPurchaseResponse::class);
    }

    /**
     * List all purchases
     * 
     * Retrieves a list of all purchases, optionally filtered by product, buyer, or date range.
     * 
     * @param ListPurchasesRequest $request The list purchases request
     * @return ListPurchasesResponse The response with purchases list
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     * @link https://digistore24.com/api/docs/paths/listPurchases.yaml
     */
    public function list(ListPurchasesRequest $request): ListPurchasesResponse
    {
        return $this->executeTyped($request, ListPurchasesResponse::class);
    }

    /**
     * Get purchase tracking information
     * 
     * TODO: Implement when getPurchaseTracking endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/getPurchaseTracking.yaml
     */
    // public function getTracking(GetPurchaseTrackingRequest $request): GetPurchaseTrackingResponse
    // {
    //     return $this->executeTyped($request, GetPurchaseTrackingResponse::class);
    // }

    /**
     * Create upgrade purchase
     * 
     * TODO: Implement when createUpgradePurchase endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/createUpgradePurchase.yaml
     */
    // public function createUpgrade(CreateUpgradePurchaseRequest $request): CreateUpgradePurchaseResponse
    // {
    //     return $this->executeTyped($request, CreateUpgradePurchaseResponse::class);
    // }

    /**
     * Add balance to purchase
     * 
     * TODO: Implement when addBalanceToPurchase endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/addBalanceToPurchase.yaml
     */
    // public function addBalance(AddBalanceToPurchaseRequest $request): AddBalanceToPurchaseResponse
    // {
    //     return $this->executeTyped($request, AddBalanceToPurchaseResponse::class);
    // }
}
