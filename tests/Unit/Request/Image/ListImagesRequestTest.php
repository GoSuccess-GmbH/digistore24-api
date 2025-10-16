<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Image;

use GoSuccess\Digistore24\Api\Request\Image\ListImagesRequest;
use PHPUnit\Framework\TestCase;

final class ListImagesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListImagesRequest();

        $this->assertInstanceOf(ListImagesRequest::class, $request);
    }

    public function test_can_create_instance_with_usage_type(): void
    {
        $request = new ListImagesRequest(usageType: 'product');

        $this->assertInstanceOf(ListImagesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListImagesRequest();

        $this->assertSame('/listImages', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array_without_usage_type(): void
    {
        $request = new ListImagesRequest();

        $array = $request->toArray();        $this->assertEmpty($array);
    }

    public function test_to_array_includes_usage_type_when_set(): void
    {
        $request = new ListImagesRequest(usageType: 'product');

        $array = $request->toArray();        $this->assertSame('product', $array['usage_type']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListImagesRequest();

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
