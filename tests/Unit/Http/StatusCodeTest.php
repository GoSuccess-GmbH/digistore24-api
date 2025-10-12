<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Tests\Unit\Http;

use GoSuccess\Digistore24\Http\StatusCode;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GoSuccess\Digistore24\Http\StatusCode
 */
final class StatusCodeTest extends TestCase
{
    public function testIsSuccessReturnsTrueFor2xxCodes(): void
    {
        $this->assertTrue(StatusCode::OK->isSuccess());
        $this->assertTrue(StatusCode::CREATED->isSuccess());
        $this->assertTrue(StatusCode::ACCEPTED->isSuccess());
        $this->assertTrue(StatusCode::NO_CONTENT->isSuccess());
    }

    public function testIsSuccessReturnsFalseForNon2xxCodes(): void
    {
        $this->assertFalse(StatusCode::BAD_REQUEST->isSuccess());
        $this->assertFalse(StatusCode::UNAUTHORIZED->isSuccess());
        $this->assertFalse(StatusCode::INTERNAL_SERVER_ERROR->isSuccess());
    }

    public function testIsClientErrorReturnsTrueFor4xxCodes(): void
    {
        $this->assertTrue(StatusCode::BAD_REQUEST->isClientError());
        $this->assertTrue(StatusCode::UNAUTHORIZED->isClientError());
        $this->assertTrue(StatusCode::FORBIDDEN->isClientError());
        $this->assertTrue(StatusCode::NOT_FOUND->isClientError());
        $this->assertTrue(StatusCode::TOO_MANY_REQUESTS->isClientError());
    }

    public function testIsClientErrorReturnsFalseForNon4xxCodes(): void
    {
        $this->assertFalse(StatusCode::OK->isClientError());
        $this->assertFalse(StatusCode::INTERNAL_SERVER_ERROR->isClientError());
    }

    public function testIsServerErrorReturnsTrueFor5xxCodes(): void
    {
        $this->assertTrue(StatusCode::INTERNAL_SERVER_ERROR->isServerError());
        $this->assertTrue(StatusCode::BAD_GATEWAY->isServerError());
        $this->assertTrue(StatusCode::SERVICE_UNAVAILABLE->isServerError());
        $this->assertTrue(StatusCode::GATEWAY_TIMEOUT->isServerError());
    }

    public function testIsServerErrorReturnsFalseForNon5xxCodes(): void
    {
        $this->assertFalse(StatusCode::OK->isServerError());
        $this->assertFalse(StatusCode::BAD_REQUEST->isServerError());
    }

    public function testDescriptionReturnsCorrectStrings(): void
    {
        $this->assertSame('OK', StatusCode::OK->description());
        $this->assertSame('Created', StatusCode::CREATED->description());
        $this->assertSame('Bad Request', StatusCode::BAD_REQUEST->description());
        $this->assertSame('Unauthorized', StatusCode::UNAUTHORIZED->description());
        $this->assertSame('Not Found', StatusCode::NOT_FOUND->description());
        $this->assertSame('Internal Server Error', StatusCode::INTERNAL_SERVER_ERROR->description());
    }

    public function testValueReturnsCorrectInteger(): void
    {
        $this->assertSame(200, StatusCode::OK->value);
        $this->assertSame(201, StatusCode::CREATED->value);
        $this->assertSame(400, StatusCode::BAD_REQUEST->value);
        $this->assertSame(401, StatusCode::UNAUTHORIZED->value);
        $this->assertSame(404, StatusCode::NOT_FOUND->value);
        $this->assertSame(500, StatusCode::INTERNAL_SERVER_ERROR->value);
    }

    public function testFromValueCreatesCorrectEnum(): void
    {
        $this->assertSame(StatusCode::OK, StatusCode::from(200));
        $this->assertSame(StatusCode::NOT_FOUND, StatusCode::from(404));
        $this->assertSame(StatusCode::INTERNAL_SERVER_ERROR, StatusCode::from(500));
    }
}
