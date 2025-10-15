<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Voucher\CreateVoucherRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\DeleteVoucherRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\GetVoucherRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\ListVouchersRequest;
use GoSuccess\Digistore24\Api\Request\Voucher\UpdateVoucherRequest;
use GoSuccess\Digistore24\Api\Response\Voucher\CreateVoucherResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\DeleteVoucherResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\GetVoucherResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\ListVouchersResponse;
use GoSuccess\Digistore24\Api\Response\Voucher\UpdateVoucherResponse;

/**
 * Voucher Resource
 *
 * Provides methods to manage vouchers and discount codes.
 */
final class VoucherResource extends AbstractResource
{
    /**
     * Get voucher details by code or ID.
     *
     * @param GetVoucherRequest $request Request containing voucher identifier
     * @return GetVoucherResponse Response with voucher details
     */
    public function get(GetVoucherRequest $request): GetVoucherResponse
    {
        return $this->executeTyped($request, GetVoucherResponse::class);
    }

    /**
     * Create a new voucher.
     *
     * @param CreateVoucherRequest $request Request with voucher configuration
     * @return CreateVoucherResponse Response with created voucher details
     */
    public function create(CreateVoucherRequest $request): CreateVoucherResponse
    {
        return $this->executeTyped($request, CreateVoucherResponse::class);
    }

    /**
     * Update an existing voucher.
     *
     * @param UpdateVoucherRequest $request Request with updated voucher data
     * @return UpdateVoucherResponse Response confirming the update
     */
    public function update(UpdateVoucherRequest $request): UpdateVoucherResponse
    {
        return $this->executeTyped($request, UpdateVoucherResponse::class);
    }

    /**
     * Delete a voucher.
     *
     * @param DeleteVoucherRequest $request Request containing voucher ID
     * @return DeleteVoucherResponse Response confirming deletion
     */
    public function delete(DeleteVoucherRequest $request): DeleteVoucherResponse
    {
        return $this->executeTyped($request, DeleteVoucherResponse::class);
    }

    /**
     * List all vouchers with optional filters.
     *
     * @param ListVouchersRequest $request Request with optional filter criteria
     * @return ListVouchersResponse Response with list of vouchers
     */
    public function list(ListVouchersRequest $request): ListVouchersResponse
    {
        return $this->executeTyped($request, ListVouchersResponse::class);
    }
}
