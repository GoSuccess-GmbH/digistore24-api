<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Response\AccountAccess;

use GoSuccess\Digistore24\Api\Response\AccountAccess\AccountAccessEntry;
use GoSuccess\Digistore24\Api\Response\AccountAccess\ListAccountAccessResponse;
use GoSuccess\Digistore24\Api\Http\Response;
use GoSuccess\Digistore24\Api\Http\StatusCode;
use PHPUnit\Framework\TestCase;

final class ListAccountAccessResponseTest extends TestCase
{
    public function test_can_create_from_array(): void
    {
        $data = [
            'accesses' => [
                [
                    'platform_name' => 'VIP Club',
                    'login_name' => 'john.doe',
                    'login_url' => 'https://example.com/login',
                    'number_of_unlocked_lectures' => 10,
                    'total_number_of_lectures' => 20,
                    'login_at' => '2024-01-15 10:30:00',
                ],
            ],
        ];

        $response = ListAccountAccessResponse::fromArray($data);

        $this->assertCount(1, $response->accesses);
        $this->assertInstanceOf(AccountAccessEntry::class, $response->accesses[0]);
        $this->assertSame('VIP Club', $response->accesses[0]->platformName);
    }

    public function test_can_create_from_response(): void
    {
        $httpResponse = new Response(
            200,
            ['data' => [
                'accesses' => [
                    [
                        'platform_name' => 'Member Area',
                        'login_name' => 'jane.smith',
                        'login_url' => 'https://members.example.com',
                        'number_of_unlocked_lectures' => 5,
                        'total_number_of_lectures' => 15,
                        'login_at' => '2024-01-20 14:45:00',
                    ],
                ],
            ]],
        );

        $response = ListAccountAccessResponse::fromResponse($httpResponse);

        $this->assertCount(1, $response->accesses);
        $this->assertSame('Member Area', $response->accesses[0]->platformName);
    }

    public function test_handles_empty_accesses_array(): void
    {
        $data = ['accesses' => []];

        $response = ListAccountAccessResponse::fromArray($data);

        $this->assertCount(0, $response->accesses);
    }

    public function test_handles_missing_accesses_key(): void
    {
        $data = [];

        $response = ListAccountAccessResponse::fromArray($data);

        $this->assertCount(0, $response->accesses);
    }

    public function test_account_access_entry_from_array(): void
    {
        $data = [
            'platform_name' => 'Test Platform',
            'login_name' => 'testuser',
            'login_url' => 'https://test.example.com',
            'number_of_unlocked_lectures' => 8,
            'total_number_of_lectures' => 12,
            'login_at' => '2024-02-01 09:15:00',
        ];

        $entry = AccountAccessEntry::fromArray($data);

        $this->assertSame('Test Platform', $entry->platformName);
        $this->assertSame('testuser', $entry->loginName);
        $this->assertSame('https://test.example.com', $entry->loginUrl);
        $this->assertSame(8, $entry->numberOfUnlockedLectures);
        $this->assertSame(12, $entry->totalNumberOfLectures);
        $this->assertInstanceOf(\DateTimeInterface::class, $entry->loginAt);
    }
}
