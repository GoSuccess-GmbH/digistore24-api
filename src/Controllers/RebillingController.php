<?php

namespace GoSuccess\Digistore24\Controllers;
use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Rebilling\CreateRebillingPaymentResponse;
use GoSuccess\Digistore24\Models\Rebilling\RebillingStatusChangeResponse;
use GoSuccess\Digistore24\Models\Rebilling\StartRebillingResponse;
use GoSuccess\Digistore24\Models\Rebilling\StopRebillingResponse;

class RebillingController extends Controller
{
    /**
     * Creates a rebilling payment.
     * Hint: The "Billing on demand" right must be enabled for your vendor account.
     * @link https://dev.digistore24.com/en/articles/146-createrebillingpayment
     * @param string $purchase_id
     * @return CreateRebillingPaymentResponse|null
     */
    public function create_rebilling( string $purchase_id ): ?CreateRebillingPaymentResponse
    {
        $data = $this->api->call(
            'createRebillingPayment',
            $purchase_id
        );
        
        if( ! $data )
        {
            return null;
        }

        return new CreateRebillingPaymentResponse( $data );
    }

    /**
     * Resumes the payments (if the payments have been stopped).
     * @link https://dev.digistore24.com/en/articles/100-startrebilling
     * @param string $purchase_id
     * @return StartRebillingResponse|null
     */
    public function start( string $purchase_id ): ?StartRebillingResponse
    {
        $data = $this->api->call(
            'startRebilling',
            $purchase_id
        );
        
        if( ! $data )
        {
            return null;
        }

        return new StartRebillingResponse( $data );
    }

    /**
     * Stops the recurring payments (for subscription and installment payments).
     * @link https://dev.digistore24.com/en/articles/107-stoprebilling
     * @param string $purchase_id
     * @param bool $force
     * @param bool $ignore_refund_possibility
     * @return StopRebillingResponse|null
     */
    public function stop( string $purchase_id, bool $force = false, bool $ignore_refund_possibility = false ): ?StopRebillingResponse
    {
        $data = $this->api->call(
            'stopRebilling',
            $purchase_id,
            $force,
            $ignore_refund_possibility
        );
        
        if( ! $data )
        {
            return null;
        }

        return new StopRebillingResponse( $data );
    }

    /**
     * Returns a list of status changes regarding rebilling.
     * @link https://dev.digistore24.com/en/articles/83-listrebillingstatuschanges
     * @param string $from
     * @param string $to
     * @param int $page_no
     * @param int $page_size
     * @return RebillingStatusChangeResponse|null
     */
    public function list_status_changes( string $from = '-24h', string $to = 'now', int $page_no = 1, int $page_size = 100 ): ?RebillingStatusChangeResponse
    {
        $data = $this->api->call(
            'listRebillingStatusChanges',
            $from,
            $to,
            $page_no,
            $page_size
        );
        
        if( ! $data )
        {
            return null;
        }

        return new RebillingStatusChangeResponse( $data );
    }
}
