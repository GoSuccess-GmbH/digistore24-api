<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Delivery\GetDeliveryRequest;
use GoSuccess\Digistore24\Request\Delivery\UpdateDeliveryRequest;
use GoSuccess\Digistore24\Request\Delivery\ListDeliveriesRequest;
use GoSuccess\Digistore24\Response\Delivery\GetDeliveryResponse;
use GoSuccess\Digistore24\Response\Delivery\UpdateDeliveryResponse;
use GoSuccess\Digistore24\Response\Delivery\ListDeliveriesResponse;
final class DeliveryResource extends AbstractResource
{
    public function get(GetDeliveryRequest $request): GetDeliveryResponse
    {
        return $this->executeTyped($request, GetDeliveryResponse::class);
    }
    public function update(UpdateDeliveryRequest $request): UpdateDeliveryResponse
    {
        return $this->executeTyped($request, UpdateDeliveryResponse::class);
    }
    public function list(ListDeliveriesRequest $request): ListDeliveriesResponse
    {
        return $this->executeTyped($request, ListDeliveriesResponse::class);
    }
}
