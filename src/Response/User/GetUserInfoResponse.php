<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\User;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Get User Info Response
 *
 * Response object for the User API endpoint.
 */
final class GetUserInfoResponse extends AbstractResponse
{
    public function __construct(private array $userInfo)
    {
    }

    public function getUserInfo(): array
    {
        return $this->userInfo;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        // Note: $data is already the inner "data" object extracted by AbstractResponse::fromResponse()
        return new self(userInfo: $data);
    }
}
