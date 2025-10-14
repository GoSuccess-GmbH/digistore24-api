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

    public function test_endpoint_returns_string(): void
    {
        $request = new ListEticketTemplatesRequest();
        $endpoint = $request->getEndpoint();
        
        $this->assertIsString($endpoint);
        $this->assertNotEmpty($endpoint);
    }

    public function test_to_array_returns_array(): void
    {
        $request = new ListEticketTemplatesRequest();
        $array = $request->toArray();
        
        $this->assertIsArray($array);
    }

    public function test_validate_returns_array(): void
    {
        $request = new ListEticketTemplatesRequest();
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
    }
}

