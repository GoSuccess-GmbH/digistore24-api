<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Resource;

use GoSuccess\Digistore24\Api\Base\AbstractResource;
use GoSuccess\Digistore24\Api\Request\AccountAccess\LogMemberAccessRequest;
use GoSuccess\Digistore24\Api\Response\AccountAccess\LogMemberAccessResponse;

/**
 * Account Access Resource
 * 
 * Handles operations for managing member access to content.
 */
final class AccountAccessResource extends AbstractResource
{
    /**
     * Log member access to content
     * 
     * Notifies Digistore that a buyer has logged into their membership account.
     * Important for German refund handling - only use for purchases without
     * the option to refund (refund_days=0 in IPN).
     * 
     * @param LogMemberAccessRequest $request The log access request
     * @return LogMemberAccessResponse The response
     * @throws \GoSuccess\Digistore24\Api\Exception\ApiException
     */
    public function logAccess(LogMemberAccessRequest $request): LogMemberAccessResponse
    {
        return $this->executeTyped($request, LogMemberAccessResponse::class);
    }
}
