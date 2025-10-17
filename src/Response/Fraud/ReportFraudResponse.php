<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Fraud;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Response from reporting fraud.
 *
 * @see https://digistore24.com/api/docs/paths/reportFraud.yaml
 */
final class ReportFraudResponse extends AbstractResponse
{
    /**
     * @param string $result
     * @param string $buyerStatus Status of buyer report (info, success, warning, failure)
     * @param string $buyerMessage Message about buyer report
     * @param string $buyerCode Code for buyer report (created_entry, rerequest, not_created)
     * @param string $affiliateStatus Status of affiliate report (info, success, warning, failure)
     * @param string $affiliateMessage Message about affiliate report
     * @param string $affiliateCode Code for affiliate report (created_entry, rerequest, not_created)
     */
    public function __construct(
        private string $result,
        private string $buyerStatus,
        private string $buyerMessage,
        private string $buyerCode,
        private string $affiliateStatus,
        private string $affiliateMessage,
        private string $affiliateCode,
    ) {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function getBuyerStatus(): string
    {
        return $this->buyerStatus;
    }

    public function getBuyerMessage(): string
    {
        return $this->buyerMessage;
    }

    public function getBuyerCode(): string
    {
        return $this->buyerCode;
    }

    public function getAffiliateStatus(): string
    {
        return $this->affiliateStatus;
    }

    public function getAffiliateMessage(): string
    {
        return $this->affiliateMessage;
    }

    public function getAffiliateCode(): string
    {
        return $this->affiliateCode;
    }

    public function wasSuccessful(): bool
    {
        return strtolower($this->result) === 'success';
    }

    /**
     * {@inheritDoc}
     */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $fraudData = $data['data'] ?? [];
        if (! is_array($fraudData)) {
            $fraudData = [];
        }

        $result = $data['result'] ?? 'unknown';
        $buyerStatus = $fraudData['buyer_status'] ?? '';
        $buyerMessage = $fraudData['buyer_message'] ?? '';
        $buyerCode = $fraudData['buyer_code'] ?? '';
        $affiliateStatus = $fraudData['affiliate_status'] ?? '';
        $affiliateMessage = $fraudData['affiliate_message'] ?? '';
        $affiliateCode = $fraudData['affiliate_code'] ?? '';

        return new self(
            result: is_string($result) ? $result : 'unknown',
            buyerStatus: is_string($buyerStatus) ? $buyerStatus : '',
            buyerMessage: is_string($buyerMessage) ? $buyerMessage : '',
            buyerCode: is_string($buyerCode) ? $buyerCode : '',
            affiliateStatus: is_string($affiliateStatus) ? $affiliateStatus : '',
            affiliateMessage: is_string($affiliateMessage) ? $affiliateMessage : '',
            affiliateCode: is_string($affiliateCode) ? $affiliateCode : '',
        );
    }
}
