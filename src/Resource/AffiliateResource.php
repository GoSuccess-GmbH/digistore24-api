<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Resource;

use GoSuccess\Digistore24\Base\AbstractResource;

/**
 * Affiliate Resource
 * 
 * Manage affiliate commissions and settings.
 * 
 * @link https://digistore24.com/api/docs/tags/affiliate
 */
final class AffiliateResource extends AbstractResource
{
    /**
     * Get affiliate commission information
     * 
     * TODO: Implement when getAffiliateCommission endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/getAffiliateCommission.yaml
     * 
     * @example
     * ```php
     * $request = new GetAffiliateCommissionRequest(
     *     productId: 12345,
     *     affiliateId: 'aff123'
     * );
     * $commission = $client->affiliates->getCommission($request);
     * echo "Commission: {$commission->percent}%\n";
     * ```
     */
    // public function getCommission(GetAffiliateCommissionRequest $request): GetAffiliateCommissionResponse
    // {
    //     return $this->executeTyped($request, GetAffiliateCommissionResponse::class);
    // }

    /**
     * Update affiliate commission
     * 
     * TODO: Implement when updateAffiliateCommission endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/updateAffiliateCommission.yaml
     */
    // public function updateCommission(UpdateAffiliateCommissionRequest $request): UpdateAffiliateCommissionResponse
    // {
    //     return $this->executeTyped($request, UpdateAffiliateCommissionResponse::class);
    // }
}
