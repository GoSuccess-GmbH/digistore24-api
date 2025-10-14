<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\OrderForm\CreateOrderformRequest;
use GoSuccess\Digistore24\Request\OrderForm\GetOrderformRequest;
use GoSuccess\Digistore24\Request\OrderForm\UpdateOrderformRequest;
use GoSuccess\Digistore24\Request\OrderForm\DeleteOrderformRequest;
use GoSuccess\Digistore24\Request\OrderForm\ListOrderformsRequest;
use GoSuccess\Digistore24\Request\OrderForm\GetOrderformMetasRequest;
use GoSuccess\Digistore24\Response\OrderForm\CreateOrderformResponse;
use GoSuccess\Digistore24\Response\OrderForm\GetOrderformResponse;
use GoSuccess\Digistore24\Response\OrderForm\UpdateOrderformResponse;
use GoSuccess\Digistore24\Response\OrderForm\DeleteOrderformResponse;
use GoSuccess\Digistore24\Response\OrderForm\ListOrderformsResponse;
use GoSuccess\Digistore24\Response\OrderForm\GetOrderformMetasResponse;
final class OrderFormResource extends AbstractResource
{
    public function create(CreateOrderformRequest $request): CreateOrderformResponse
    {
        return $this->executeTyped($request, CreateOrderformResponse::class);
    }
    public function get(GetOrderformRequest $request): GetOrderformResponse
    {
        return $this->executeTyped($request, GetOrderformResponse::class);
    }
    public function update(UpdateOrderformRequest $request): UpdateOrderformResponse
    {
        return $this->executeTyped($request, UpdateOrderformResponse::class);
    }
    public function delete(DeleteOrderformRequest $request): DeleteOrderformResponse
    {
        return $this->executeTyped($request, DeleteOrderformResponse::class);
    }
    public function list(ListOrderformsRequest $request): ListOrderformsResponse
    {
        return $this->executeTyped($request, ListOrderformsResponse::class);
    }
    public function getMetas(GetOrderformMetasRequest $request): GetOrderformMetasResponse
    {
        return $this->executeTyped($request, GetOrderformMetasResponse::class);
    }
}
