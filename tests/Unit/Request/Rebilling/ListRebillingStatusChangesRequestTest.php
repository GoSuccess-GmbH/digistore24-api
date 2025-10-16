<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Rebilling;

use GoSuccess\Digistore24\Api\Request\Rebilling\ListRebillingStatusChangesRequest;
use PHPUnit\Framework\TestCase;

final class ListRebillingStatusChangesRequestTest extends TestCase
{
    public function test_can_create_instance(): void
    {
        $request = new ListRebillingStatusChangesRequest();

        $this->assertInstanceOf(ListRebillingStatusChangesRequest::class, $request);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListRebillingStatusChangesRequest();

        $this->assertSame('/listRebillingStatusChanges', $request->getEndpoint());
    }

    public function test_to_array_with_date_range(): void
    {
        $request = new ListRebillingStatusChangesRequest(from: '2024-01-01', to: '2024-12-31');

        $array = $request->toArray();        $this->assertSame('2024-01-01', $array['from']);
        $this->assertSame('2024-12-31', $array['to']);
    }

    public function test_validate_returns_empty_array(): void
    {
        $request = new ListRebillingStatusChangesRequest();

        $errors = $request->validate();        $this->assertEmpty($errors);
    }
}
