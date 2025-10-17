<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Purchase;

use GoSuccess\Digistore24\Api\Request\Purchase\GetCustomerToAffiliateBuyerDetailsRequest;
use PHPUnit\Framework\TestCase;

final class GetCustomerToAffiliateBuyerDetailsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new GetCustomerToAffiliateBuyerDetailsRequest(purchaseId: 'P12345');

        $this->assertInstanceOf(GetCustomerToAffiliateBuyerDetailsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new GetCustomerToAffiliateBuyerDetailsRequest(purchaseId: 'P12345');

        $this->assertSame('/getCustomerToAffiliateBuyerDetails', $request->getEndpoint());
    }

    public function test_to_array_includes_purchase_id(): void
    {
        $request = new GetCustomerToAffiliateBuyerDetailsRequest(purchaseId: 'P12345');

        $array = $request->toArray();
        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new GetCustomerToAffiliateBuyerDetailsRequest(purchaseId: 'P12345');

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
