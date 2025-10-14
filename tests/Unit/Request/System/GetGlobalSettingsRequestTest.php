<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\System;

use GoSuccess\Digistore24\Api\Request\System\GetGlobalSettingsRequest;
use PHPUnit\Framework\TestCase;

final class GetGlobalSettingsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetGlobalSettingsRequest();
        
        $this->assertInstanceOf(GetGlobalSettingsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetGlobalSettingsRequest();
        
        $this->assertSame('/getGlobalSettings', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new GetGlobalSettingsRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetGlobalSettingsRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

