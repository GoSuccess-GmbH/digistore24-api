<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\Fraud;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;

/**
 * Response from reporting fraud.
 *
 * @see https://digistore24.com/api/docs/paths/reportFraud.yaml
 */
final readonly class ReportFraudResponse extends AbstractResponse
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
    ) {}

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
    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        $fraudData = $data['data'] ?? [];

        return new self(
            result: (string) ($data['result'] ?? 'unknown'),
            buyerStatus: (string) ($fraudData['buyer_status'] ?? ''),
            buyerMessage: (string) ($fraudData['buyer_message'] ?? ''),
            buyerCode: (string) ($fraudData['buyer_code'] ?? ''),
            affiliateStatus: (string) ($fraudData['affiliate_status'] ?? ''),
            affiliateMessage: (string) ($fraudData['affiliate_message'] ?? ''),
            affiliateCode: (string) ($fraudData['affiliate_code'] ?? ''),
        );
    }
}
