<?php

namespace GoSuccess\Digistore24\Controllers;
use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Billing\CreateBillingOnDemandRequest;
use GoSuccess\Digistore24\Models\Billing\CreateBillingOnDemandResponse;

class BillingController extends Controller
{
    /**
     * Creates a billing on demand.
     * Hint: The "Billing on demand" right must be enabled for your vendor account.
     * @link https://dev.digistore24.com/en/articles/17-createbillingondemand
     * @param \GoSuccess\Digistore24\Models\Billing\CreateBillingOnDemandRequest $billing
     * @return CreateBillingOnDemandResponse|null
     */
    public function create_billing_on_demand( CreateBillingOnDemandRequest $billing ): ?CreateBillingOnDemandResponse
    {
        $data = $this->api->call(
            'createBillingOnDemand',
            $billing->purchase_id,
            $billing->product_id,
            $billing->payment_plan,
            $billing->tracking,
            $billing->placeholders,
            $billing->settings,
            $billing->addons
        );
        
        if( ! $data )
        {
            return null;
        }

        return new CreateBillingOnDemandResponse( $data );
    }
}
