<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Image;

use GoSuccess\Digistore24\Api\Request\Image\DeleteImageRequest;
use PHPUnit\Framework\TestCase;

final class DeleteImageRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new DeleteImageRequest(imageId: 'IMG123');

        $this->assertInstanceOf(DeleteImageRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new DeleteImageRequest(imageId: 'IMG123');

        $this->assertSame('/deleteImage', $request->getEndpoint());
    }

    public function test_to_array_includes_image_id(): void
    {
        $request = new DeleteImageRequest(imageId: 'IMG123');

        $array = $request->toArray();
        $this->assertSame('IMG123', $array['image_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new DeleteImageRequest(imageId: 'IMG123');

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
