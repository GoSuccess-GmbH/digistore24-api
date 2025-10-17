<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Http;

use GoSuccess\Digistore24\Api\Enum\HttpStatusCode;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HttpStatusCode::class)]
final class StatusCodeTest extends TestCase
{
    public function testIsSuccessReturnsTrueFor2xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::OK->isSuccess());
        $this->assertTrue(HttpStatusCode::CREATED->isSuccess());
        $this->assertTrue(HttpStatusCode::ACCEPTED->isSuccess());
        $this->assertTrue(HttpStatusCode::NO_CONTENT->isSuccess());
    }

    public function testIsSuccessReturnsFalseForNon2xxCodes(): void
    {
        $this->assertFalse(HttpStatusCode::BAD_REQUEST->isSuccess());
        $this->assertFalse(HttpStatusCode::UNAUTHORIZED->isSuccess());
        $this->assertFalse(HttpStatusCode::INTERNAL_SERVER_ERROR->isSuccess());
    }

    public function testIsClientErrorReturnsTrueFor4xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::BAD_REQUEST->isClientError());
        $this->assertTrue(HttpStatusCode::UNAUTHORIZED->isClientError());
        $this->assertTrue(HttpStatusCode::FORBIDDEN->isClientError());
        $this->assertTrue(HttpStatusCode::NOT_FOUND->isClientError());
        $this->assertTrue(HttpStatusCode::TOO_MANY_REQUESTS->isClientError());
    }

    public function testIsClientErrorReturnsFalseForNon4xxCodes(): void
    {
        $this->assertFalse(HttpStatusCode::OK->isClientError());
        $this->assertFalse(HttpStatusCode::INTERNAL_SERVER_ERROR->isClientError());
    }

    public function testIsServerErrorReturnsTrueFor5xxCodes(): void
    {
        $this->assertTrue(HttpStatusCode::INTERNAL_SERVER_ERROR->isServerError());
        $this->assertTrue(HttpStatusCode::BAD_GATEWAY->isServerError());
        $this->assertTrue(HttpStatusCode::SERVICE_UNAVAILABLE->isServerError());
        $this->assertTrue(HttpStatusCode::GATEWAY_TIMEOUT->isServerError());
    }

    public function testIsServerErrorReturnsFalseForNon5xxCodes(): void
    {
        $this->assertFalse(HttpStatusCode::OK->isServerError());
        $this->assertFalse(HttpStatusCode::BAD_REQUEST->isServerError());
    }

    public function testLabelReturnsCorrectStrings(): void
    {
        $this->assertSame('OK', HttpStatusCode::OK->label());
        $this->assertSame('Created', HttpStatusCode::CREATED->label());
        $this->assertSame('Bad Request', HttpStatusCode::BAD_REQUEST->label());
        $this->assertSame('Unauthorized', HttpStatusCode::UNAUTHORIZED->label());
        $this->assertSame('Not Found', HttpStatusCode::NOT_FOUND->label());
        $this->assertSame('Internal Server Error', HttpStatusCode::INTERNAL_SERVER_ERROR->label());
    }

    public function testDescriptionIsDeprecatedAliasForLabel(): void
    {
        // description() is deprecated but should still work
        $this->assertSame('OK', HttpStatusCode::OK->description());
        $this->assertSame(HttpStatusCode::OK->label(), HttpStatusCode::OK->description());
    }

    public function testValueReturnsCorrectInteger(): void
    {
        $this->assertSame(200, HttpStatusCode::OK->value);
        $this->assertSame(201, HttpStatusCode::CREATED->value);
        $this->assertSame(400, HttpStatusCode::BAD_REQUEST->value);
        $this->assertSame(401, HttpStatusCode::UNAUTHORIZED->value);
        $this->assertSame(404, HttpStatusCode::NOT_FOUND->value);
        $this->assertSame(500, HttpStatusCode::INTERNAL_SERVER_ERROR->value);
    }

    public function testFromValueCreatesCorrectEnum(): void
    {
        $this->assertSame(HttpStatusCode::OK, HttpStatusCode::from(200));
        $this->assertSame(HttpStatusCode::NOT_FOUND, HttpStatusCode::from(404));
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR, HttpStatusCode::from(500));
    }
}
