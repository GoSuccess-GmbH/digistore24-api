<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\ConversionTool;

use GoSuccess\Digistore24\Api\Request\ConversionTool\ListConversionToolsRequest;
use PHPUnit\Framework\TestCase;

final class ListConversionToolsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListConversionToolsRequest(type: 'upsell');
        
        $this->assertInstanceOf(ListConversionToolsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListConversionToolsRequest(type: 'upsell');
        
        $this->assertSame('listConversionTools', $request->getEndpoint());
    }

    public function test_to_array_includes_type(): void
    {
        $request = new ListConversionToolsRequest(type: 'upsell');
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertSame('upsell', $array['type']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListConversionToolsRequest(type: 'upsell');
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

