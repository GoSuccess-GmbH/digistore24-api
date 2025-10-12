<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Rebilling\CreateRebillingPaymentResponse;
use GoSuccess\Digistore24\Models\Rebilling\RebillingStatusChangeResponse;
use GoSuccess\Digistore24\Models\Rebilling\StartRebillingResponse;
use GoSuccess\Digistore24\Models\Rebilling\StopRebillingResponse;

class RebillingController extends Controller
{
    /**
     * Creates a rebilling payment
     * Hint: The "Billing on demand" right must be enabled for your vendor account
     * @link https://dev.digistore24.com/en/articles/146-createrebillingpayment
     * @param string $purchaseId
     * @return CreateRebillingPaymentResponse|null
     */
    public function createRebilling(string $purchaseId): ?CreateRebillingPaymentResponse
    {
        $data = $this->api->call('createRebillingPayment', $purchaseId);
        
        if (!$data) {
            return null;
        }

        return new CreateRebillingPaymentResponse($data);
    }

    /**
     * Resumes the payments (if the payments have been stopped)
     * @link https://dev.digistore24.com/en/articles/100-startrebilling
     * @param string $purchaseId
     * @return StartRebillingResponse|null
     */
    public function start(string $purchaseId): ?StartRebillingResponse
    {
        $data = $this->api->call('startRebilling', $purchaseId);
        
        if (!$data) {
            return null;
        }

        return new StartRebillingResponse($data);
    }

    /**
     * Stops the recurring payments (for subscription and installment payments)
     * @link https://dev.digistore24.com/en/articles/107-stoprebilling
     * @param string $purchaseId
     * @param bool $force
     * @param bool $ignoreRefundPossibility
     * @return StopRebillingResponse|null
     */
    public function stop(
        string $purchaseId,
        bool $force = false,
        bool $ignoreRefundPossibility = false
    ): ?StopRebillingResponse {
        $data = $this->api->call(
            'stopRebilling',
            $purchaseId,
            $force,
            $ignoreRefundPossibility
        );
        
        if (!$data) {
            return null;
        }

        return new StopRebillingResponse($data);
    }

    /**
     * Returns a list of status changes regarding rebilling
     * @link https://dev.digistore24.com/en/articles/83-listrebillingstatuschanges
     * @param string $from
     * @param string $to
     * @param int $pageNo
     * @param int $pageSize
     * @return RebillingStatusChangeResponse|null
     */
    public function listStatusChanges(
        string $from = '-24h',
        string $to = 'now',
        int $pageNo = 1,
        int $pageSize = 100
    ): ?RebillingStatusChangeResponse {
        $data = $this->api->call(
            'listRebillingStatusChanges',
            $from,
            $to,
            $pageNo,
            $pageSize
        );
        
        if (!$data) {
            return null;
        }

        return new RebillingStatusChangeResponse($data);
    }
}
