<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\Affiliate;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;
use GoSuccess\Digistore24\Api\Enum\HttpMethod;

/**
 * Set Affiliate For Email Request
 *
 * Assigns an affiliate to a specific email address.
 */
final class SetAffiliateForEmailRequest extends AbstractRequest
{
    /**
     * @param string $email The email address
     * @param string $affiliateId The affiliate ID to assign
     */
    public function __construct(
        private string $email,
        private string $affiliateId,
    ) {
    }

    public function getEndpoint(): string
    {
        return '/setAffiliateForEmail';
    }

    public function method(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'affiliate_id' => $this->affiliateId,
        ];
    }
}
