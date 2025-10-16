<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\User\GetUserInfoRequest;
use GoSuccess\Digistore24\Api\Response\User\GetUserInfoResponse;

/**
 * User Resource
 *
 * Provides methods to retrieve user account information.
 */
final class UserResource extends AbstractResource
{
    /**
     * Get user account information.
     *
     * @param GetUserInfoRequest|null $request Optional request to retrieve user information
     * @return GetUserInfoResponse Response with user account details
     */
    public function getInfo(?GetUserInfoRequest $request = null): GetUserInfoResponse
    {
        return $this->executeTyped($request ?? new GetUserInfoRequest(), GetUserInfoResponse::class);
    }
}
