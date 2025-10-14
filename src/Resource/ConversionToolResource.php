<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\ConversionTool\ListConversionToolsRequest;
use GoSuccess\Digistore24\Api\Request\ConversionTool\ValidateCouponCodeRequest;
use GoSuccess\Digistore24\Api\Response\ConversionTool\ListConversionToolsResponse;
use GoSuccess\Digistore24\Api\Response\ConversionTool\ValidateCouponCodeResponse;
final class ConversionToolResource extends AbstractResource
{
    public function list(ListConversionToolsRequest $request): ListConversionToolsResponse
    {
        return $this->executeTyped($request, ListConversionToolsResponse::class);
    }
    public function validateCoupon(ValidateCouponCodeRequest $request): ValidateCouponCodeResponse
    {
        return $this->executeTyped($request, ValidateCouponCodeResponse::class);
    }
}
