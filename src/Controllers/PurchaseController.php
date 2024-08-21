<?php

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
     * Get a purchase by order id.
     * @link https://dev.digistore24.com/en/articles/51-getpurchase
     * @param string $purchase_id
     * @return Purchase|null
     */
    public function get( string $purchase_id ): ?Purchase
    {
        $data = $this->api->call(
            'getPurchase',
            $purchase_id
        );
        
        if( ! $data )
        {
            return null;
        }

        return new Purchase( $data );
    }

    /**
     * Get a list of your sales.
     * @link https://dev.digistore24.com/en/articles/82-listpurchases
     * @param string|\DateTime $from
     * @param string|\DateTime $to
     * @param array $search
     * @param string $sort_by
     * @param string $sort_order
     * @param bool $load_transactions
     * @param int $page_no
     * @param int $page_size
     * @return Purchase[]|null
     */
    public function list( string|DateTime $from = '-24h', string|DateTime $to = 'now' , array $search = [], string $sort_by = 'date', string $sort_order = 'asc', bool $load_transactions = false, int $page_no = 1, int $page_size = 500 ): ?array
    {
        $data = $this->api->call(
            'listPurchases',
            $from,
            $to,
            $search,
            $sort_by,
            $sort_order,
            $load_transactions,
            $page_no,
            $page_size
        );
        
        if( ! $data )
        {
            return null;
        }



        return array_map(
            function( $data )
            {
                return new Purchase( $data );
            },
            $data->purchase_list
        );
    }

    /**
     * Add or remove (negative amount) balance to purchase.
     * @link https://dev.digistore24.com/en/articles/6-addbalancetopurchase
     * @param string $purchase_id
     * @param float $amount
     * @return Balance|null
     */
    public function add_balance( string $purchase_id, float $amount ): ?Balance
    {
        $data = $this->api->call(
            'addBalanceToPurchase',
            $purchase_id,
            $amount
        );
        
        if( ! $data )
        {
            return null;
        }

        return new Balance( $data );
    }

    /**
     * Performs an upgrade without user interaction.
     * Hint: The "Billing on demand" right must be enabled for your vendor account.
     * @link https://dev.digistore24.com/en/articles/26-createupgradepurchase
     * @param array $purchase_ids
     * @param string $upgrade_id
     * @param int|false $payment_plan_id
     * @param array $quantities
     * @return CreateUpgradePurchaseResponse|null
     */
    public function upgrade( array $purchase_ids, string $upgrade_id, int|false $payment_plan_id = false, array $quantities = [] ): ?CreateUpgradePurchaseResponse
    {
        $data = $this->api->call(
            'createUpgradePurchase',
            implode( ',', $purchase_ids ),
            $upgrade_id,
            $payment_plan_id,
            $quantities
        );

        if( ! $data )
        {
            return null;
        }

        return new CreateUpgradePurchaseResponse( $data );
    }

    /**
     * Get tracking data for an order.
     * @link https://dev.digistore24.com/en/articles/148-getpurchasetracking
     * @param string $purchase_id
     * @return Tracking|null
     */
    public function get_tracking( string $purchase_id ): ?Tracking
    {
        $data = $this->api->call(
            'getPurchaseTracking',
            $purchase_id
        );
        
        if( ! $data )
        {
            return null;
        }

        return new Tracking( $data );
    }
}
