<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\ConversionTool\ListConversionToolsRequest;
use GoSuccess\Digistore24\Request\ConversionTool\ValidateCouponCodeRequest;
use GoSuccess\Digistore24\Response\ConversionTool\ListConversionToolsResponse;
use GoSuccess\Digistore24\Response\ConversionTool\ValidateCouponCodeResponse;
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
