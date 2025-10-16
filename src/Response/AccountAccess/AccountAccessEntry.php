<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Response\AccountAccess;

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

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data, ?Response $rawResponse = null): static
    {
        $platformName = $data['platform_name'] ?? '';
        $loginName = $data['login_name'] ?? '';
        $loginUrl = $data['login_url'] ?? '';
        $unlockedLectures = $data['number_of_unlocked_lectures'] ?? 0;
        $totalLectures = $data['total_number_of_lectures'] ?? 0;
        $loginAtStr = $data['login_at'] ?? 'now';

        return new self(
            platformName: is_string($platformName) ? $platformName : '',
            loginName: is_string($loginName) ? $loginName : '',
            loginUrl: is_string($loginUrl) ? $loginUrl : '',
            numberOfUnlockedLectures: is_int($unlockedLectures) ? $unlockedLectures : 0,
            totalNumberOfLectures: is_int($totalLectures) ? $totalLectures : 0,
            loginAt: new \DateTimeImmutable(is_string($loginAtStr) ? $loginAtStr : 'now'),
        );
    }
}
