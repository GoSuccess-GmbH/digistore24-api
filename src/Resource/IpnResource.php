<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Ipn\IpnSetupRequest;
use GoSuccess\Digistore24\Request\Ipn\IpnInfoRequest;
use GoSuccess\Digistore24\Request\Ipn\IpnDeleteRequest;
use GoSuccess\Digistore24\Response\Ipn\IpnSetupResponse;
use GoSuccess\Digistore24\Response\Ipn\IpnInfoResponse;
use GoSuccess\Digistore24\Response\Ipn\IpnDeleteResponse;
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
