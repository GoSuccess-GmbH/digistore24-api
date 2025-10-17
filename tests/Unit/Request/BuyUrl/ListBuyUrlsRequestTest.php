<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\BuyUrl;

use GoSuccess\Digistore24\Api\Request\BuyUrl\ListBuyUrlsRequest;
use PHPUnit\Framework\TestCase;

final class ListBuyUrlsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListBuyUrlsRequest();

        $this->assertInstanceOf(ListBuyUrlsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListBuyUrlsRequest();

        $this->assertSame('/listBuyUrls', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array(): void
    {
        $request = new ListBuyUrlsRequest();

        $array = $request->toArray();
        $this->assertEmpty($array);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListBuyUrlsRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
