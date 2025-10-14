<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Upsell\GetUpsellsRequest;
use GoSuccess\Digistore24\Api\Request\Upsell\UpdateUpsellsRequest;
use GoSuccess\Digistore24\Api\Request\Upsell\DeleteUpsellsRequest;
use GoSuccess\Digistore24\Api\Response\Upsell\GetUpsellsResponse;
use GoSuccess\Digistore24\Api\Response\Upsell\UpdateUpsellsResponse;
use GoSuccess\Digistore24\Api\Response\Upsell\DeleteUpsellsResponse;
final class UpsellResource extends AbstractResource
{
    public function get(GetUpsellsRequest $request): GetUpsellsResponse
    {
        return $this->executeTyped($request, GetUpsellsResponse::class);
    }
    public function update(UpdateUpsellsRequest $request): UpdateUpsellsResponse
    {
        return $this->executeTyped($request, UpdateUpsellsResponse::class);
    }
    public function delete(DeleteUpsellsRequest $request): DeleteUpsellsResponse
    {
        return $this->executeTyped($request, DeleteUpsellsResponse::class);
    }
}
