<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\AccountAccess;

use GoSuccess\Digistore24\Api\Base\AbstractResponse;
use GoSuccess\Digistore24\Api\Http\Response;

/**
 * Account Access Entry
 *
 * Represents a single member access log entry.
 */
final class AccountAccessEntry
{
    public function __construct(
        public readonly string $platformName,
        public readonly string $loginName,
        public readonly string $loginUrl,
        public readonly int $numberOfUnlockedLectures,
        public readonly int $totalNumberOfLectures,
        public readonly \DateTimeInterface $loginAt,
    ) {
    }

    public static function fromArray(array $data, ?\GoSuccess\Digistore24\Api\Http\Response $rawResponse = null): static
    {
        return new self(
            platformName: $data['platform_name'] ?? '',
            loginName: $data['login_name'] ?? '',
            loginUrl: $data['login_url'] ?? '',
            numberOfUnlockedLectures: (int) ($data['number_of_unlocked_lectures'] ?? 0),
            totalNumberOfLectures: (int) ($data['total_number_of_lectures'] ?? 0),
            loginAt: new \DateTimeImmutable($data['login_at'] ?? 'now'),
        );
    }
}

/**
 * List Account Access Response
 *
 * Response containing all logged member accesses for a purchase.
 */
final class ListAccountAccessResponse extends AbstractResponse
{
    /**
     * @param array<AccountAccessEntry> $accesses Array of access log entries
     */
    public function __construct(
        public readonly array $accesses,
    ) {
    }

    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $accesses = [];
        
        // Support both direct and nested data structures
        $accessData = $data['data']['accesses'] ?? $data['accesses'] ?? [];

        if (is_array($accessData)) {
            foreach ($accessData as $entry) {
                $accesses[] = AccountAccessEntry::fromArray($entry);
            }
        }

        return new self(accesses: $accesses);
    }
}
