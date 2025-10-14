<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Voucher\GetVoucherRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\CreateVoucherRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\UpdateVoucherRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\DeleteVoucherRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\ListVouchersRequest;
use GoSuccess\Digistore24\Api\Response\Voucher\GetVoucherResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\CreateVoucherResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\UpdateVoucherResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\DeleteVoucherResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\ListVouchersResponse;
final class VoucherResource extends AbstractResource
{
    public function get(GetVoucherRequest $request): GetVoucherResponse
    {
        return $this->executeTyped($request, GetVoucherResponse::class);
    }
    public function create(CreateVoucherRequest $request): CreateVoucherResponse
    {
        return $this->executeTyped($request, CreateVoucherResponse::class);
    }
    public function update(UpdateVoucherRequest $request): UpdateVoucherResponse
    {
        return $this->executeTyped($request, UpdateVoucherResponse::class);
    }
    public function delete(DeleteVoucherRequest $request): DeleteVoucherResponse
    {
        return $this->executeTyped($request, DeleteVoucherResponse::class);
    }
    public function list(ListVouchersRequest $request): ListVouchersResponse
    {
        return $this->executeTyped($request, ListVouchersResponse::class);
    }
}
