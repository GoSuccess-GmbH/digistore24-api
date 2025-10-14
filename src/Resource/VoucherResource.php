<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\Voucher\GetVoucherRequest;
use GoSuccess\Digistore24\Request\Voucher\CreateVoucherRequest;
use GoSuccess\Digistore24\Request\Voucher\UpdateVoucherRequest;
use GoSuccess\Digistore24\Request\Voucher\DeleteVoucherRequest;
use GoSuccess\Digistore24\Request\Voucher\ListVouchersRequest;
use GoSuccess\Digistore24\Response\Voucher\GetVoucherResponse;
use GoSuccess\Digistore24\Response\Voucher\CreateVoucherResponse;
use GoSuccess\Digistore24\Response\Voucher\UpdateVoucherResponse;
use GoSuccess\Digistore24\Response\Voucher\DeleteVoucherResponse;
use GoSuccess\Digistore24\Response\Voucher\ListVouchersResponse;
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
