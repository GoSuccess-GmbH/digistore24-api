<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\Affiliate\GetAffiliateCommissionRequest;
use GoSuccess\Digistore24\Api\Request\Affiliate\UpdateAffiliateCommissionRequest;
use GoSuccess\Digistore24\Api\Request\Affiliate\GetAffiliateForEmailRequest;
use GoSuccess\Digistore24\Api\Request\Affiliate\SetAffiliateForEmailRequest;
use GoSuccess\Digistore24\Api\Request\Affiliate\GetReferringAffiliateRequest;
use GoSuccess\Digistore24\Api\Request\Affiliate\SetReferringAffiliateRequest;
use GoSuccess\Digistore24\Api\Request\Affiliate\ValidateAffiliateRequest;
use GoSuccess\Digistore24\Api\Response\Affiliate\GetAffiliateCommissionResponse;
use GoSuccess\Digistore24\Api\Response\Affiliate\UpdateAffiliateCommissionResponse;
use GoSuccess\Digistore24\Api\Response\Affiliate\GetAffiliateForEmailResponse;
use GoSuccess\Digistore24\Api\Response\Affiliate\SetAffiliateForEmailResponse;
use GoSuccess\Digistore24\Api\Response\Affiliate\GetReferringAffiliateResponse;
use GoSuccess\Digistore24\Api\Response\Affiliate\SetReferringAffiliateResponse;
use GoSuccess\Digistore24\Api\Response\Affiliate\ValidateAffiliateResponse;
final class AffiliateResource extends AbstractResource
{
    public function getCommission(GetAffiliateCommissionRequest $request): GetAffiliateCommissionResponse
    {
        return $this->executeTyped($request, GetAffiliateCommissionResponse::class);
    }
    public function updateCommission(UpdateAffiliateCommissionRequest $request): UpdateAffiliateCommissionResponse
    {
        return $this->executeTyped($request, UpdateAffiliateCommissionResponse::class);
    }
    public function getForEmail(GetAffiliateForEmailRequest $request): GetAffiliateForEmailResponse
    {
        return $this->executeTyped($request, GetAffiliateForEmailResponse::class);
    }
    public function setForEmail(SetAffiliateForEmailRequest $request): SetAffiliateForEmailResponse
    {
        return $this->executeTyped($request, SetAffiliateForEmailResponse::class);
    }
    public function getReferring(GetReferringAffiliateRequest $request): GetReferringAffiliateResponse
    {
        return $this->executeTyped($request, GetReferringAffiliateResponse::class);
    }
    public function setReferring(SetReferringAffiliateRequest $request): SetReferringAffiliateResponse
    {
        return $this->executeTyped($request, SetReferringAffiliateResponse::class);
    }
    public function validate(ValidateAffiliateRequest $request): ValidateAffiliateResponse
    {
        return $this->executeTyped($request, ValidateAffiliateResponse::class);
    }
}
