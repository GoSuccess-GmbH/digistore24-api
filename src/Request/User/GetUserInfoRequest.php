<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\User;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Http\Method;

/**
 * Get User Info Request
 *
 * Retrieves information about the authenticated user/vendor account.
 */
final class GetUserInfoRequest extends AbstractRequest
{
    public function __construct()
    {
    }

    public function getEndpoint(): string
    {
        return '/getUserInfo';
    }

    public function method(): Method
    {
        return Method::GET;
    }

    public function toArray(): array
    {
        return [];
    }
}
