<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\User;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

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

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(userInfo: $data['data'] ?? []);
    }
}
