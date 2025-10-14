<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Request\AccountAccess;

use GoSuccess\Digistore24\Api\Base\AbstractRequest;

/**
 * Log Member Access Request
 * 
 * Notifies Digistore that a buyer has logged into their membership account
 * and accessed the bought content. Important for German refund handling.
 * Only call this if the buyer actually has logged in.
 */
final class LogMemberAccessRequest extends AbstractRequest
{
    /**
     * @param string $purchaseId The ID of the purchase
     * @param string $platformName The readable name of the membership area (e.g., "VIP Club")
     * @param string $loginName The buyer's username for the membership area
     * @param string $loginUrl The URL the buyer used to login
     * @param int $numberOfUnlockedLectures Number of lectures the member has access to
     * @param int $totalNumberOfLectures Total number of lectures in the course
     * @param \DateTimeInterface|null $loginAt Date time of login (defaults to now if null)
     */
    public function __construct(
        public string $purchaseId,
        public string $platformName,
        public string $loginName,
        public string $loginUrl,
        public int $numberOfUnlockedLectures,
        public int $totalNumberOfLectures,
        public ?\DateTimeInterface $loginAt = null,
    ) {
    }

    public function endpoint(): string
    {
        return 'logMemberAccess';
    }

    protected function rules(): array
    {
        return [
            'purchase_id' => 'required',
            'platform_name' => 'required',
            'login_name' => 'required',
            'login_url' => 'required|url',
            'number_of_unlocked_lectures' => 'required|min:0',
            'total_number_of_lectures' => 'required|min:0',
        ];
    }
}
