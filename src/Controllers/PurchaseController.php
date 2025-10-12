<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Controllers;

use DateTime;
use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Purchase\CreateUpgradePurchaseResponse;
use GoSuccess\Digistore24\Models\Purchase\Purchase;
use GoSuccess\Digistore24\Models\Purchase\Balance;
use GoSuccess\Digistore24\Models\Purchase\Tracking;

class PurchaseController extends Controller
{
    /**
     * Get a purchase by order id
     * @link https://dev.digistore24.com/en/articles/51-getpurchase
     * @param string $purchaseId
     * @return Purchase|null
     */
    public function get(string $purchaseId): ?Purchase
    {
        $data = $this->api->call('getPurchase', $purchaseId);
        
        if (!$data) {
            return null;
        }

        return new Purchase($data);
    }

    /**
     * Get a list of your sales
     * @link https://dev.digistore24.com/en/articles/82-listpurchases
     * @param string|DateTime $from
     * @param string|DateTime $to
     * @param array<string, mixed> $search
     * @param string $sortBy
     * @param string $sortOrder
     * @param bool $loadTransactions
     * @param int $pageNo
     * @param int $pageSize
     * @return array<Purchase>|null
     */
    public function list(
        string|DateTime $from = '-24h',
        string|DateTime $to = 'now',
        array $search = [],
        string $sortBy = 'date',
        string $sortOrder = 'asc',
        bool $loadTransactions = false,
        int $pageNo = 1,
        int $pageSize = 500
    ): ?array {
        $data = $this->api->call(
            'listPurchases',
            $from,
            $to,
            $search,
            $sortBy,
            $sortOrder,
            $loadTransactions,
            $pageNo,
            $pageSize
        );
        
        if (!$data) {
            return null;
        }

        return $this->mapToModels($data->purchase_list, Purchase::class);
    }

    /**
     * Add or remove (negative amount) balance to purchase
     * @link https://dev.digistore24.com/en/articles/6-addbalancetopurchase
     * @param string $purchaseId
     * @param float $amount
     * @return Balance|null
     */
    public function addBalance(string $purchaseId, float $amount): ?Balance
    {
        $data = $this->api->call('addBalanceToPurchase', $purchaseId, $amount);
        
        if (!$data) {
            return null;
        }

        return new Balance($data);
    }

    /**
     * Performs an upgrade without user interaction
     * Hint: The "Billing on demand" right must be enabled for your vendor account
     * @link https://dev.digistore24.com/en/articles/26-createupgradepurchase
     * @param array<string> $purchaseIds
     * @param string $upgradeId
     * @param int|false $paymentPlanId
     * @param array<string, int> $quantities
     * @return CreateUpgradePurchaseResponse|null
     */
    public function upgrade(
        array $purchaseIds,
        string $upgradeId,
        int|false $paymentPlanId = false,
        array $quantities = []
    ): ?CreateUpgradePurchaseResponse {
        $data = $this->api->call(
            'createUpgradePurchase',
            implode(',', $purchaseIds),
            $upgradeId,
            $paymentPlanId,
            $quantities
        );

        if (!$data) {
            return null;
        }

        return new CreateUpgradePurchaseResponse($data);
    }

    /**
     * Get tracking data for an order
     * @link https://dev.digistore24.com/en/articles/148-getpurchasetracking
     * @param string $purchaseId
     * @return Tracking|null
     */
    public function getTracking(string $purchaseId): ?Tracking
    {
        $data = $this->api->call('getPurchaseTracking', $purchaseId);
        
        if (!$data) {
            return null;
        }

        return new Tracking($data);
    }
}
