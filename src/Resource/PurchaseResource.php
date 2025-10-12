<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Resource;

use GoSuccess\Digistore24\Base\AbstractResource;

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
     * Get purchase details
     * 
     * TODO: Implement when getPurchase endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/getPurchase.yaml
     * 
     * @example
     * ```php
     * $request = new GetPurchaseRequest(purchaseId: 'ABC123');
     * $purchase = $client->purchases->get($request);
     * echo "Order: {$purchase->orderId}\n";
     * ```
     */
    // public function get(GetPurchaseRequest $request): GetPurchaseResponse
    // {
    //     return $this->executeTyped($request, GetPurchaseResponse::class);
    // }

    /**
     * List all purchases
     * 
     * TODO: Implement when listPurchases endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/listPurchases.yaml
     */
    // public function list(ListPurchasesRequest $request): ListPurchasesResponse
    // {
    //     return $this->executeTyped($request, ListPurchasesResponse::class);
    // }

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
