<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\PaymentPlan\CreatePaymentplanRequest;
use GoSuccess\Digistore24\Api\Request\PaymentPlan\UpdatePaymentplanRequest;
use GoSuccess\Digistore24\Api\Request\PaymentPlan\DeletePaymentplanRequest;
use GoSuccess\Digistore24\Api\Request\PaymentPlan\ListPaymentPlansRequest;
use GoSuccess\Digistore24\Api\Response\PaymentPlan\CreatePaymentplanResponse;
use GoSuccess\Digistore24\Api\Response\PaymentPlan\UpdatePaymentplanResponse;
use GoSuccess\Digistore24\Api\Response\PaymentPlan\DeletePaymentplanResponse;
use GoSuccess\Digistore24\Api\Response\PaymentPlan\ListPaymentPlansResponse;
final class PaymentPlanResource extends AbstractResource
{
    public function create(CreatePaymentplanRequest $request): CreatePaymentplanResponse
    {
        return $this->executeTyped($request, CreatePaymentplanResponse::class);
    }
    public function update(UpdatePaymentplanRequest $request): UpdatePaymentplanResponse
    {
        return $this->executeTyped($request, UpdatePaymentplanResponse::class);
    }
    public function delete(DeletePaymentplanRequest $request): DeletePaymentplanResponse
    {
        return $this->executeTyped($request, DeletePaymentplanResponse::class);
    }
    public function list(ListPaymentPlansRequest $request): ListPaymentPlansResponse
    {
        return $this->executeTyped($request, ListPaymentPlansResponse::class);
    }
}
