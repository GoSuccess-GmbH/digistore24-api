<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\ConversionTool\ListConversionToolsRequest;
use GoSuccess\Digistore24\Api\Request\ConversionTool\ValidateCouponCodeRequest;
use GoSuccess\Digistore24\Api\Response\ConversionTool\ListConversionToolsResponse;
use GoSuccess\Digistore24\Api\Response\ConversionTool\ValidateCouponCodeResponse;

/**
 * Conversion Tool Resource
 *
 * Provides methods to manage and validate conversion tools like coupons and vouchers.
 */
final class ConversionToolResource extends AbstractResource
{
    /**
     * List all available conversion tools.
     *
     * @param ListConversionToolsRequest $request Request with optional filters
     * @return ListConversionToolsResponse Response with list of conversion tools
     */
    public function list(ListConversionToolsRequest $request): ListConversionToolsResponse
    {
        return $this->executeTyped($request, ListConversionToolsResponse::class);
    }

    /**
     * Validate a coupon or voucher code.
     *
     * @param ValidateCouponCodeRequest $request Request containing coupon code
     * @return ValidateCouponCodeResponse Response with validation result
     */
    public function validateCoupon(ValidateCouponCodeRequest $request): ValidateCouponCodeResponse
    {
        return $this->executeTyped($request, ValidateCouponCodeResponse::class);
    }
}
