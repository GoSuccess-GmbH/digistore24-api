<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\DataTransferObject;

use GoSuccess\Digistore24\Api\DTO\TrackingInfoData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TrackingInfoData::class)]
final class TrackingInfoDataTest extends TestCase
{
    public function testCanCreateWithValidTrackingInfo(): void
    {
        $tracking = new TrackingInfoData();
        $tracking->parcelService = 'DHL';
        $tracking->trackingId = 'JJD000123456789';
        $tracking->expectDeliveryAt = '2025-01-20';
        $tracking->quantity = 2;

        $this->assertSame('DHL', $tracking->parcelService);
        $this->assertSame('JJD000123456789', $tracking->trackingId);
        $this->assertSame('2025-01-20', $tracking->expectDeliveryAt);
        $this->assertSame(2, $tracking->quantity);
    }

    public function testExpectDeliveryAtValidationThrowsExceptionForInvalidFormat(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected delivery date must be in YYYY-MM-DD format');

        $tracking = new TrackingInfoData();
        $tracking->expectDeliveryAt = '20-01-2025'; // Wrong format
    }

    public function testQuantityValidationThrowsExceptionForZero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantity must be at least 1');

        $tracking = new TrackingInfoData();
        $tracking->quantity = 0;
    }

    public function testQuantityValidationThrowsExceptionForNegative(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantity must be at least 1');

        $tracking = new TrackingInfoData();
        $tracking->quantity = -1;
    }

    public function testOperationValidationThrowsExceptionForInvalidOperation(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid operation: invalid_op');

        $tracking = new TrackingInfoData();
        $tracking->operation = 'invalid_op';
    }

    public function testOperationDefaultsToCreateOrUpdate(): void
    {
        $tracking = new TrackingInfoData();

        $this->assertSame('create_or_update', $tracking->operation);
    }

    public function testFromArrayCreatesInstanceCorrectly(): void
    {
        $data = [
            'parcel_service' => 'DHL',
            'tracking_id' => 'JJD000123456789',
            'expect_delivery_at' => '2025-01-20',
            'quantity' => 3,
            'operation' => 'delete',
        ];

        $tracking = TrackingInfoData::fromArray($data);

        $this->assertSame('DHL', $tracking->parcelService);
        $this->assertSame('JJD000123456789', $tracking->trackingId);
        $this->assertSame('2025-01-20', $tracking->expectDeliveryAt);
        $this->assertSame(3, $tracking->quantity);
        $this->assertSame('delete', $tracking->operation);
    }

    public function testToArrayConvertsCorrectly(): void
    {
        $tracking = new TrackingInfoData();
        $tracking->parcelService = 'DHL';
        $tracking->trackingId = 'JJD000123456789';
        $tracking->expectDeliveryAt = '2025-01-20';

        $array = $tracking->toArray();

        $this->assertSame([
            'operation' => 'create_or_update',
            'parcel_service' => 'DHL',
            'tracking_id' => 'JJD000123456789',
            'expect_delivery_at' => '2025-01-20',
        ], $array);
    }

    public function testOptionalFieldsCanBeNull(): void
    {
        $tracking = new TrackingInfoData();

        $this->assertNull($tracking->parcelService);
        $this->assertNull($tracking->trackingId);
        $this->assertNull($tracking->expectDeliveryAt);
        $this->assertNull($tracking->quantity);
    }

    public function testToArrayExcludesNullFields(): void
    {
        $tracking = new TrackingInfoData();
        $tracking->parcelService = 'DHL';

        $array = $tracking->toArray();

        $this->assertArrayHasKey('operation', $array);
        $this->assertArrayHasKey('parcel_service', $array);
        $this->assertArrayNotHasKey('tracking_id', $array);
        $this->assertArrayNotHasKey('expect_delivery_at', $array);
        $this->assertArrayNotHasKey('quantity', $array);
    }
}
