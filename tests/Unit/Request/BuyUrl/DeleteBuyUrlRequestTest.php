<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Request\BuyUrl\DeleteBuyUrlRequest;
use PHPUnit\Framework\TestCase;

final class DeleteBuyUrlRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeleteBuyUrlRequest(id: 123);

        $this->assertInstanceOf(DeleteBuyUrlRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new DeleteBuyUrlRequest(id: 123);

        $this->assertSame('/deleteBuyUrl', $request->getEndpoint());
    }

    public function test_to_array_includes_id(): void
    {
        $request = new DeleteBuyUrlRequest(id: 123);

        $array = $request->toArray();
        $this->assertSame(123, $array['id']);
    }

    public function test_validate_returns_empty_array_for_valid_id(): void
    {
        $request = new DeleteBuyUrlRequest(id: 123);

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }

    public function test_validate_returns_error_for_invalid_id(): void
    {
        $request = new DeleteBuyUrlRequest(id: 0);

        $errors = $request->validate();
        $this->assertNotEmpty($errors);
    }
}
