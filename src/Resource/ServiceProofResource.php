<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\ServiceProof\GetServiceProofRequestRequest;
use GoSuccess\Digistore24\Api\Request\ServiceProof\UpdateServiceProofRequestRequest;
use GoSuccess\Digistore24\Api\Request\ServiceProof\ListServiceProofRequestsRequest;
use GoSuccess\Digistore24\Api\Response\ServiceProof\GetServiceProofRequestResponse;
use GoSuccess\Digistore24\Api\Response\ServiceProof\UpdateServiceProofRequestResponse;
use GoSuccess\Digistore24\Api\Response\ServiceProof\ListServiceProofRequestsResponse;
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
