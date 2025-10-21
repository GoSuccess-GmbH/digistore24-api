<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\CustomForm;

use GoSuccess\Digistore24\Api\Request\CustomForm\ListCustomFormRecordsRequest;
use PHPUnit\Framework\TestCase;

final class ListCustomFormRecordsRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListCustomFormRecordsRequest();

        $this->assertInstanceOf(ListCustomFormRecordsRequest::class, $request);
    }

    public function test_can_create_instance_with_purchase_id(): void
    {
        $request = new ListCustomFormRecordsRequest(purchaseId: 'P12345');

        $this->assertInstanceOf(ListCustomFormRecordsRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListCustomFormRecordsRequest();

        $this->assertSame('/listCustomFormRecords', $request->getEndpoint());
    }

    public function test_to_array_returns_empty_array_without_purchase_id(): void
    {
        $request = new ListCustomFormRecordsRequest();

        $array = $request->toArray();
        $this->assertEmpty($array);
    }

    public function test_to_array_includes_purchase_id_when_set(): void
    {
        $request = new ListCustomFormRecordsRequest(purchaseId: 'P12345');

        $array = $request->toArray();
        $this->assertSame('P12345', $array['purchase_id']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListCustomFormRecordsRequest();

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
