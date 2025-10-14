<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Api\Resource;
use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\User\GetUserInfoRequest;
use GoSuccess\Digistore24\Api\Response\User\GetUserInfoResponse;
final class UserResource extends AbstractResource
{
    public function getInfo(GetUserInfoRequest $request): GetUserInfoResponse
    {
        return $this->executeTyped($request, GetUserInfoResponse::class);
    }
}
