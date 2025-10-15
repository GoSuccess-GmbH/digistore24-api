<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\User;

use GoSuccess\Digistore24\Api\Request\User\GetUserInfoRequest;
use PHPUnit\Framework\TestCase;

final class GetUserInfoRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetUserInfoRequest();

        $this->assertInstanceOf(GetUserInfoRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetUserInfoRequest();

        $this->assertSame('/getUserInfo', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new GetUserInfoRequest();

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetUserInfoRequest();

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
