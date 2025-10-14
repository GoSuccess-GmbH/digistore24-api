<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Rebilling\CreateRebillingPaymentRequest;
use GoSuccess\Digistore24\Api\Request\Rebilling\StartRebillingRequest;
use GoSuccess\Digistore24\Api\Request\Rebilling\StopRebillingRequest;
use GoSuccess\Digistore24\Api\Request\Rebilling\ListRebillingStatusChangesRequest;
use GoSuccess\Digistore24\Api\Response\Rebilling\CreateRebillingPaymentResponse;
use GoSuccess\Digistore24\Api\Response\Rebilling\StartRebillingResponse;
use GoSuccess\Digistore24\Api\Response\Rebilling\StopRebillingResponse;
use GoSuccess\Digistore24\Api\Response\Rebilling\ListRebillingStatusChangesResponse;
final class RebillingResource extends AbstractResource
{
    public function createPayment(CreateRebillingPaymentRequest $request): CreateRebillingPaymentResponse
    {
        return $this->executeTyped($request, CreateRebillingPaymentResponse::class);
    }
    public function start(StartRebillingRequest $request): StartRebillingResponse
    {
        return $this->executeTyped($request, StartRebillingResponse::class);
    }
    public function stop(StopRebillingRequest $request): StopRebillingResponse
    {
        return $this->executeTyped($request, StopRebillingResponse::class);
    }
    public function listStatusChanges(ListRebillingStatusChangesRequest $request): ListRebillingStatusChangesResponse
    {
        return $this->executeTyped($request, ListRebillingStatusChangesResponse::class);
    }
}
