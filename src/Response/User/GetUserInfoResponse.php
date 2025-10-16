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
    /**
     * @param array<string, mixed> $userInfo
     */
    public function __construct(private array $userInfo)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function getUserInfo(): array
    {
        return $this->userInfo;
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $innerData = self::extractInnerData($data);

        return new self(userInfo: $innerData);
    }
}
