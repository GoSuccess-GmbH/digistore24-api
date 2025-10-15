<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Affiliate;

use GoSuccess\Digistore24\Api\Request\Affiliate\SetAffiliateForEmailRequest;
use PHPUnit\Framework\TestCase;

final class SetAffiliateForEmailRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new SetAffiliateForEmailRequest(
            email: 'test@example.com',
            affiliateId: 'AFF123',
        );

        $this->assertInstanceOf(SetAffiliateForEmailRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new SetAffiliateForEmailRequest(
            email: 'test@example.com',
            affiliateId: 'AFF123',
        );

        $this->assertSame('/setAffiliateForEmail', $request->getEndpoint());
    }

    public function test_to_array_returns_correct_data(): void
    {
        $request = new SetAffiliateForEmailRequest(
            email: 'test@example.com',
            affiliateId: 'AFF123',
        );

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertSame('test@example.com', $array['email']);
        $this->assertSame('AFF123', $array['affiliate_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new SetAffiliateForEmailRequest(
            email: 'test@example.com',
            affiliateId: 'AFF123',
        );

        $errors = $request->validate();

        $this->assertIsArray($errors);
        $this->assertEmpty($errors);
    }
}
