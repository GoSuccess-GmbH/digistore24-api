<?php

namespace GoSuccess\Digistore24\Controllers;
use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Affiliate\Commission;
use GoSuccess\Digistore24\Models\Affiliate\CommissionUpdateRequest;
use GoSuccess\Digistore24\Models\Affiliate\CommissionUpdateResponse;

class AffiliateController extends Controller
{
    /**
     * Get current affiliate commission.
     * @link https://dev.digistore24.com/en/articles/38-getaffiliatecommission
     * @param int|string $affiliate_id
     * @param array $product_ids
     * @return Commission|null
     */
    public function get_commission( int|string $affiliate_id, array $product_ids = [] ): ?Commission
    {
        $data = $this->api->call(
            'getAffiliateCommission',
            $affiliate_id,
            implode( ',', $product_ids )
        );
        
        if( ! $data )
        {
            return null;
        }

        return new Commission( $data );
    }

    /**
     * Get affiliate commission.
     * @link https://dev.digistore24.com/en/articles/109-updateaffiliatecommission
     * @param \GoSuccess\Digistore24\Models\Affiliate\CommissionUpdateRequest|null $data
     * @return CommissionUpdateResponse|null
     */
    public function update_commission( CommissionUpdateRequest $data = null ): ?CommissionUpdateResponse
    {
        $affiliate_id = $data->affiliate_id;
        $product_ids = is_array( $data->product_ids ) ? implode( ',', $data->product_ids ) : $data->product_ids;
        
        unset( $data->affiliate_id );
        unset( $data->product_ids );

        $update_data = $data === null ? [] : get_object_vars( $data );

        $data = $this->api->call(
            'updateAffiliateCommission',
            $affiliate_id,
            $product_ids,
            $update_data
        );

        if( ! $data )
        {
            return null;
        }

        return new CommissionUpdateResponse( $data );
    }
}
