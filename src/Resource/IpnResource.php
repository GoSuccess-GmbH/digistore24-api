<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnSetupRequest;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnInfoRequest;
use GoSuccess\Digistore24\Api\Request\Ipn\IpnDeleteRequest;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnSetupResponse;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnInfoResponse;
use GoSuccess\Digistore24\Api\Response\Ipn\IpnDeleteResponse;
final class IpnResource extends AbstractResource
{
    public function setup(IpnSetupRequest $request): IpnSetupResponse
    {
        return $this->executeTyped($request, IpnSetupResponse::class);
    }
    public function info(IpnInfoRequest $request): IpnInfoResponse
    {
        return $this->executeTyped($request, IpnInfoResponse::class);
    }
    public function delete(IpnDeleteRequest $request): IpnDeleteResponse
    {
        return $this->executeTyped($request, IpnDeleteResponse::class);
    }
}
