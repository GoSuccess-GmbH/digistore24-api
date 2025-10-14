<?php
declare(strict_types=1);
namespace GoSuccess\Digistore24\Resource;
use GoSuccess\Digistore24\Base\AbstractResource;
use GoSuccess\Digistore24\Request\User\GetUserInfoRequest;
use GoSuccess\Digistore24\Response\User\GetUserInfoResponse;
final class UserResource extends AbstractResource
{
    public function getInfo(GetUserInfoRequest $request): GetUserInfoResponse
    {
        return $this->executeTyped($request, GetUserInfoResponse::class);
    }
}
