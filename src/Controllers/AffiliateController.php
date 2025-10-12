<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Affiliate\Commission;
use GoSuccess\Digistore24\Models\Affiliate\CommissionUpdateRequest;
use GoSuccess\Digistore24\Models\Affiliate\CommissionUpdateResponse;

class AffiliateController extends Controller
{
    /**
     * Get current affiliate commission
     * @link https://dev.digistore24.com/en/articles/38-getaffiliatecommission
     * @param int|string $affiliateId
     * @param array<int> $productIds
     * @return Commission|null
     */
    public function getCommission(int|string $affiliateId, array $productIds = []): ?Commission
    {
        $data = $this->api->call(
            'getAffiliateCommission',
            $affiliateId,
            implode(',', $productIds)
        );
        
        if (!$data) {
            return null;
        }

        return new Commission($data);
    }

    /**
     * Update affiliate commission
     * @link https://dev.digistore24.com/en/articles/109-updateaffiliatecommission
     * @param CommissionUpdateRequest $request
     * @return CommissionUpdateResponse|null
     */
    public function updateCommission(CommissionUpdateRequest $request): ?CommissionUpdateResponse
    {
        $affiliateId = $request->affiliate_id;
        $productIds = is_array($request->product_ids) 
            ? implode(',', $request->product_ids) 
            : $request->product_ids;
        
        unset($request->affiliate_id);
        unset($request->product_ids);

        $updateData = get_object_vars($request);

        $data = $this->api->call(
            'updateAffiliateCommission',
            $affiliateId,
            $productIds,
            $updateData
        );

        if (!$data) {
            return null;
        }

        return new CommissionUpdateResponse($data);
    }
}
