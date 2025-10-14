<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Image;

use GoSuccess\Digistore24\Api\Request\Image\CreateImageRequest;
use PHPUnit\Framework\TestCase;

final class CreateImageRequestTest extends TestCase
{
    public function testCanCreateWithRequiredFields(): void
    {
        $request = new CreateImageRequest(
            name: 'Product Image',
            imageUrl: 'https://example.com/image.jpg'
        );

        $this->assertSame('Product Image', $request->name);
        $this->assertSame('https://example.com/image.jpg', $request->imageUrl);
        $this->assertNull($request->usageType);
        $this->assertNull($request->altTag);
    }

    public function testCanCreateWithAllFields(): void
    {
        $request = new CreateImageRequest(
            name: 'Product Image',
            imageUrl: 'https://example.com/image.jpg',
            usageType: 'product',
            altTag: 'Premium Product Photo'
        );

        $this->assertSame('Product Image', $request->name);
        $this->assertSame('https://example.com/image.jpg', $request->imageUrl);
        $this->assertSame('product', $request->usageType);
        $this->assertSame('Premium Product Photo', $request->altTag);
    }

    public function testNameCannotExceed63Characters(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Image name must not exceed 63 characters');

        new CreateImageRequest(
            name: str_repeat('a', 64),
            imageUrl: 'https://example.com/image.jpg'
        );
    }

    public function testNameCanBe63Characters(): void
    {
        $request = new CreateImageRequest(
            name: str_repeat('a', 63),
            imageUrl: 'https://example.com/image.jpg'
        );

        $this->assertSame(63, strlen($request->name));
    }

    public function testEndpointReturnsCorrectValue(): void
    {
        $request = new CreateImageRequest(
            name: 'Product Image',
            imageUrl: 'https://example.com/image.jpg'
        );

        $this->assertSame('createImage', $request->getEndpoint());
    }

    public function testToArrayWithMinimalData(): void
    {
        $request = new CreateImageRequest(
            name: 'Product Image',
            imageUrl: 'https://example.com/image.jpg'
        );

        $array = $request->toArray();

        $this->assertArrayHasKey('data', $array);
        $this->assertSame('Product Image', $array['data']['name']);
        $this->assertSame('https://example.com/image.jpg', $array['data']['image-url']);
        $this->assertArrayNotHasKey('usage_type', $array['data']);
        $this->assertArrayNotHasKey('alt_tag', $array['data']);
    }

    public function testToArrayWithAllData(): void
    {
        $request = new CreateImageRequest(
            name: 'Product Image',
            imageUrl: 'https://example.com/image.jpg',
            usageType: 'product',
            altTag: 'Premium Product Photo'
        );

        $array = $request->toArray();

        $this->assertArrayHasKey('data', $array);
        $this->assertSame('Product Image', $array['data']['name']);
        $this->assertSame('https://example.com/image.jpg', $array['data']['image-url']);
        $this->assertSame('product', $array['data']['usage_type']);
        $this->assertSame('Premium Product Photo', $array['data']['alt_tag']);
    }

    public function testValidationPassesForValidData(): void
    {
        $request = new CreateImageRequest(
            name: 'Product Image',
            imageUrl: 'https://example.com/image.jpg'
        );

        $this->assertTrue($request->isValid());
        $this->assertEmpty($request->validate());
    }
}
