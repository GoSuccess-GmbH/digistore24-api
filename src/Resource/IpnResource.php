<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;

/**
 * IPN Resource
 * 
 * Manage Instant Payment Notifications (webhooks).
 * 
 * @link https://digistore24.com/api/docs/tags/ipn
 */
final class IpnResource extends AbstractResource
{
    /**
     * Setup IPN endpoint
     * 
     * TODO: Implement when ipnSetup endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/ipnSetup.yaml
     * 
     * @example
     * ```php
     * $request = new IpnSetupRequest(
     *     url: 'https://example.com/webhook',
     *     productId: 12345
     * );
     * $response = $client->ipn->setup($request);
     * ```
     */
    // public function setup(IpnSetupRequest $request): IpnSetupResponse
    // {
    //     return $this->executeTyped($request, IpnSetupResponse::class);
    // }

    /**
     * Get IPN information
     * 
     * TODO: Implement when ipnInfo endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/ipnInfo.yaml
     */
    // public function info(IpnInfoRequest $request): IpnInfoResponse
    // {
    //     return $this->executeTyped($request, IpnInfoResponse::class);
    // }

    /**
     * Delete IPN endpoint
     * 
     * TODO: Implement when ipnDelete endpoint is added
     * 
     * @link https://digistore24.com/api/docs/paths/ipnDelete.yaml
     */
    // public function delete(IpnDeleteRequest $request): IpnDeleteResponse
    // {
    //     return $this->executeTyped($request, IpnDeleteResponse::class);
    // }
}
