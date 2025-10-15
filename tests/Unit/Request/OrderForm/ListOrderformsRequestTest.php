<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\OrderForm;

use GoSuccess\Digistore24\Api\Request\OrderForm\ListOrderformsRequest;
use PHPUnit\Framework\TestCase;

final class ListOrderformsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListOrderformsRequest();
        
        $this->assertInstanceOf(ListOrderformsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListOrderformsRequest();
        
        $this->assertSame('/listOrderforms', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListOrderformsRequest();
        
        $array = $request->toArray();
        
        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListOrderformsRequest();
        
        $errors = $request->validate();
        
        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}

