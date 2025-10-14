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

    public function test_endpoint_returns_string(): void
    {
        $request = new ListImagesRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListImagesRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListImagesRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

