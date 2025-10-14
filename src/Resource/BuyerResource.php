<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Buyer\GetBuyerRequest;
use GoSuccess\Digistore24\Request\Buyer\ListBuyersRequest;
use GoSuccess\Digistore24\Request\Buyer\UpdateBuyerRequest;
use GoSuccess\Digistore24\Response\Buyer\GetBuyerResponse;
use GoSuccess\Digistore24\Response\Buyer\ListBuyersResponse;
use GoSuccess\Digistore24\Response\Buyer\UpdateBuyerResponse;
final class BuyerResource extends AbstractResource
{
    public function get(GetBuyerRequest $request): GetBuyerResponse
    {
        return $this->executeTyped($request, GetBuyerResponse::class);
    }
    public function list(ListBuyersRequest $request): ListBuyersResponse
    {
        return $this->executeTyped($request, ListBuyersResponse::class);
    }
    public function update(UpdateBuyerRequest $request): UpdateBuyerResponse
    {
        return $this->executeTyped($request, UpdateBuyerResponse::class);
    }
}
