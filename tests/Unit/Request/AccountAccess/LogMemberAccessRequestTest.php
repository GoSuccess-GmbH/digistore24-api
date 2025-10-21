<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\AccountAccess;

use GoSuccess\Digistore24\Api\Request\AccountAccess\LogMemberAccessRequest;
use PHPUnit\Framework\TestCase;

final class LogMemberAccessRequestTest extends TestCase
{
    public function testCanCreateWithRequiredFields(): void
    {
        $request = new LogMemberAccessRequest(
            purchaseId: 'P12345',
            platformName: 'VIP Club',
            loginName: 'john.doe',
            loginUrl: 'https://example.com/login',
            numberOfUnlockedLectures: 5,
            totalNumberOfLectures: 10,
        );

        $this->assertSame('P12345', $request->purchaseId);
        $this->assertSame('VIP Club', $request->platformName);
        $this->assertSame('john.doe', $request->loginName);
        $this->assertSame('https://example.com/login', $request->loginUrl);
        $this->assertSame(5, $request->numberOfUnlockedLectures);
        $this->assertSame(10, $request->totalNumberOfLectures);
        $this->assertNull($request->loginAt);
    }

    public function testCanSetLoginAt(): void
    {
        $loginAt = new \DateTime('2025-10-14 10:30:00');

        $request = new LogMemberAccessRequest(
            purchaseId: 'P12345',
            platformName: 'VIP Club',
            loginName: 'john.doe',
            loginUrl: 'https://example.com/login',
            numberOfUnlockedLectures: 5,
            totalNumberOfLectures: 10,
            loginAt: $loginAt,
        );

        $this->assertSame($loginAt, $request->loginAt);
    }

    public function testEndpointReturnsCorrectValue(): void
    {
        $request = new LogMemberAccessRequest(
            purchaseId: 'P12345',
            platformName: 'VIP Club',
            loginName: 'john.doe',
            loginUrl: 'https://example.com/login',
            numberOfUnlockedLectures: 5,
            totalNumberOfLectures: 10,
        );

        $this->assertSame('/logMemberAccess', $request->getEndpoint());
    }

    public function testToArrayConvertsCorrectly(): void
    {
        $loginAt = new \DateTime('2025-10-14 10:30:00');

        $request = new LogMemberAccessRequest(
            purchaseId: 'P12345',
            platformName: 'VIP Club',
            loginName: 'john.doe',
            loginUrl: 'https://example.com/login',
            numberOfUnlockedLectures: 5,
            totalNumberOfLectures: 10,
            loginAt: $loginAt,
        );

        $array = $request->toArray();

        $this->assertSame('P12345', $array['purchase_id']);
        $this->assertSame('VIP Club', $array['platform_name']);
        $this->assertSame('john.doe', $array['login_name']);
        $this->assertSame('https://example.com/login', $array['login_url']);
        $this->assertSame(5, $array['number_of_unlocked_lectures']);
        $this->assertSame(10, $array['total_number_of_lectures']);
        $this->assertSame('2025-10-14 10:30:00', $array['login_at']);
    }

    public function testValidationPassesForValidData(): void
    {
        $request = new LogMemberAccessRequest(
            purchaseId: 'P12345',
            platformName: 'VIP Club',
            loginName: 'john.doe',
            loginUrl: 'https://example.com/login',
            numberOfUnlockedLectures: 5,
            totalNumberOfLectures: 10,
        );

        $this->assertTrue($request->isValid());
        $this->assertEmpty($request->validate());
    }

    public function testCanHaveZeroLectures(): void
    {
        $request = new LogMemberAccessRequest(
            purchaseId: 'P12345',
            platformName: 'VIP Club',
            loginName: 'john.doe',
            loginUrl: 'https://example.com/login',
            numberOfUnlockedLectures: 0,
            totalNumberOfLectures: 0,
        );

        $this->assertTrue($request->isValid());
    }
}
