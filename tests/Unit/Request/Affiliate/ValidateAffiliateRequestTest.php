<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Enum\HttpMethod;
use GoSuccess\Digistore24\Api\Request\Affiliate\ValidateAffiliateRequest;
use PHPUnit\Framework\TestCase;

final class ValidateAffiliateRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ValidateAffiliateRequest(
            affiliateName: 'testaffiliate',
            productIds: '123,456',
        );

        $this->assertInstanceOf(ValidateAffiliateRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ValidateAffiliateRequest(
            affiliateName: 'testaffiliate',
            productIds: '123',
        );

        $this->assertSame('/validateAffiliate', $request->getEndpoint());
    }

    public function test_method_returns_get(): void
    {
        $request = new ValidateAffiliateRequest(
            affiliateName: 'testaffiliate',
            productIds: '123',
        );

        $this->assertSame(HttpMethod::GET, $request->getMethod());
    }

    public function test_to_array_includes_correct_parameters(): void
    {
        $request = new ValidateAffiliateRequest(
            affiliateName: 'testaffiliate',
            productIds: '123,456,789',
        );

        $array = $request->toArray();
        $this->assertSame('testaffiliate', $array['affiliate_name']);
        $this->assertSame('123,456,789', $array['product_ids']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ValidateAffiliateRequest(
            affiliateName: 'testaffiliate',
            productIds: '123',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
