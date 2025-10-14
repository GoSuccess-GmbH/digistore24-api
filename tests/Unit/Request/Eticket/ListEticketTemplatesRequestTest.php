<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Eticket;

use GoSuccess\Digistore24\Api\Request\Eticket\ListEticketTemplatesRequest;
use PHPUnit\Framework\TestCase;

final class ListEticketTemplatesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListEticketTemplatesRequest();
        
        $this->assertInstanceOf(ListEticketTemplatesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListEticketTemplatesRequest();
        
        $this->assertSame('/listEticketTemplates', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListEticketTemplatesRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListEticketTemplatesRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

