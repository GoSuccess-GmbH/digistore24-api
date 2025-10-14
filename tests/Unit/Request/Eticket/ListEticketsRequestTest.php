<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request\Eticket;

use GoSuccess\Digistore24\Api\Request\Eticket\ListEticketsRequest;
use PHPUnit\Framework\TestCase;

final class ListEticketsRequestTest extends TestCase
{
    public function test_can_create_with_no_filters(): void
    {
        $request = new ListEticketsRequest();

        $this->assertNull($request->productId);
        $this->assertNull($request->locationId);
        $this->assertNull($request->fromDate);
        $this->assertNull($request->toDate);
        $this->assertNull($request->onlyValidated);
    }

    public function test_can_create_with_product_filter(): void
    {
        $request = new ListEticketsRequest(
            productId: '12345',
        );

        $this->assertSame('12345', $request->productId);
    }

    public function test_can_create_with_location_filter(): void
    {
        $request = new ListEticketsRequest(
            locationId: 'LOC001',
        );

        $this->assertSame('LOC001', $request->locationId);
    }

    public function test_can_create_with_date_filters(): void
    {
        $fromDate = new \DateTimeImmutable('2024-01-01');
        $toDate = new \DateTimeImmutable('2024-12-31');

        $request = new ListEticketsRequest(
            fromDate: $fromDate,
            toDate: $toDate,
        );

        $this->assertSame($fromDate, $request->fromDate);
        $this->assertSame($toDate, $request->toDate);
    }

    public function test_can_create_with_validated_filter(): void
    {
        $request = new ListEticketsRequest(
            onlyValidated: true,
        );

        $this->assertTrue($request->onlyValidated);
    }

    public function test_can_create_with_all_filters(): void
    {
        $fromDate = new \DateTimeImmutable('2024-06-01');
        $toDate = new \DateTimeImmutable('2024-06-30');

        $request = new ListEticketsRequest(
            productId: '12345',
            locationId: 'LOC001',
            fromDate: $fromDate,
            toDate: $toDate,
            onlyValidated: false,
        );

        $this->assertSame('12345', $request->productId);
        $this->assertSame('LOC001', $request->locationId);
        $this->assertSame($fromDate, $request->fromDate);
        $this->assertSame($toDate, $request->toDate);
        $this->assertFalse($request->onlyValidated);
    }

    public function test_endpoint_returns_correct_value(): void
    {
        $request = new ListEticketsRequest();

        $this->assertSame('/listEtickets', $request->getEndpoint());
    }

    public function test_to_array_with_no_filters(): void
    {
        $request = new ListEticketsRequest();

        $array = $request->toArray();

        $this->assertIsArray($array);
        $this->assertEmpty($array);
    }

    public function test_to_array_with_product_id(): void
    {
        $request = new ListEticketsRequest(
            productId: '12345',
        );

        $array = $request->toArray();

        $this->assertSame('12345', $array['product_id']);
    }

    public function test_to_array_with_date_filters(): void
    {
        $fromDate = new \DateTimeImmutable('2024-01-15');
        $toDate = new \DateTimeImmutable('2024-02-20');

        $request = new ListEticketsRequest(
            fromDate: $fromDate,
            toDate: $toDate,
        );

        $array = $request->toArray();

        $this->assertSame('2024-01-15', $array['from_date']);
        $this->assertSame('2024-02-20', $array['to_date']);
    }

    public function test_to_array_with_validated_filter_true(): void
    {
        $request = new ListEticketsRequest(
            onlyValidated: true,
        );

        $array = $request->toArray();

        $this->assertSame('y', $array['only_validated']);
    }

    public function test_to_array_with_validated_filter_false(): void
    {
        $request = new ListEticketsRequest(
            onlyValidated: false,
        );

        $array = $request->toArray();

        $this->assertSame('n', $array['only_validated']);
    }

    public function test_validation_passes_for_valid_data(): void
    {
        $request = new ListEticketsRequest(
            productId: '12345',
        );

        $errors = $request->validate();
        $this->assertEmpty($errors);
    }
}
