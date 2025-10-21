<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnDeleteRequest;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnInfoRequest;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnSetupRequest;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnDeleteResponse;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnInfoResponse;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnSetupResponse;

/**
 * IPN (Instant Payment Notification) Resource
 *
 * Provides methods to manage IPN endpoints for receiving payment notifications.
 */
final class IpnResource extends AbstractResource
{
    /**
     * Set up IPN endpoint for a product.
     *
     * @param IpnSetupRequest $request Request containing product ID and IPN URL
     * @return IpnSetupResponse Response confirming IPN setup
     */
    public function setup(IpnSetupRequest $request): IpnSetupResponse
    {
        return $this->executeTyped($request, IpnSetupResponse::class);
    }

    /**
     * Get IPN configuration information.
     *
     * @param IpnInfoRequest|null $request Optional request containing product ID
     * @return IpnInfoResponse Response with IPN configuration details
     */
    public function info(?IpnInfoRequest $request = null): IpnInfoResponse
    {
        return $this->executeTyped($request ?? new IpnInfoRequest(), IpnInfoResponse::class);
    }

    /**
     * Delete IPN endpoint configuration.
     *
     * @param IpnDeleteRequest|null $request Optional request containing product ID
     * @return IpnDeleteResponse Response confirming IPN deletion
     */
    public function delete(?IpnDeleteRequest $request = null): IpnDeleteResponse
    {
        return $this->executeTyped($request ?? new IpnDeleteRequest(), IpnDeleteResponse::class);
    }
}
