<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\ServiceProof\GetServiceProofRequestRequest;
use GoSuccess\Digistore24\Request\ServiceProof\UpdateServiceProofRequestRequest;
use GoSuccess\Digistore24\Request\ServiceProof\ListServiceProofRequestsRequest;
use GoSuccess\Digistore24\Response\ServiceProof\GetServiceProofRequestResponse;
use GoSuccess\Digistore24\Response\ServiceProof\UpdateServiceProofRequestResponse;
use GoSuccess\Digistore24\Response\ServiceProof\ListServiceProofRequestsResponse;
final class ServiceProofResource extends AbstractResource
{
    public function get(GetServiceProofRequestRequest $request): GetServiceProofRequestResponse
    {
        return $this->executeTyped($request, GetServiceProofRequestResponse::class);
    }
    public function update(UpdateServiceProofRequestRequest $request): UpdateServiceProofRequestResponse
    {
        return $this->executeTyped($request, UpdateServiceProofRequestResponse::class);
    }
    public function list(ListServiceProofRequestsRequest $request): ListServiceProofRequestsResponse
    {
        return $this->executeTyped($request, ListServiceProofRequestsResponse::class);
    }
}
