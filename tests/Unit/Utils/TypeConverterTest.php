<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Utils;

use GoSuccess\Digistore24\Api\Util\TypeConverter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TypeConverter::class)]
final class TypeConverterTest extends TestCase
{
    public function testToIntConvertsStringToInteger(): void
    {
        $this->assertSame(42, TypeConverter::toInt('42'));
        $this->assertSame(0, TypeConverter::toInt('0'));
        $this->assertSame(-123, TypeConverter::toInt('-123'));
    }

    public function testToIntReturnsIntegerAsIs(): void
    {
        $this->assertSame(42, TypeConverter::toInt(42));
    }

    public function testToIntReturnsNullForNull(): void
    {
        $this->assertNull(TypeConverter::toInt(null));
    }

    public function testToFloatConvertsStringToFloat(): void
    {
        $this->assertSame(42.5, TypeConverter::toFloat('42.5'));
        $this->assertSame(0.0, TypeConverter::toFloat('0'));
        $this->assertSame(-123.456, TypeConverter::toFloat('-123.456'));
    }

    public function testToFloatReturnsFloatAsIs(): void
    {
        $this->assertSame(42.5, TypeConverter::toFloat(42.5));
    }

    public function testToFloatReturnsNullForNull(): void
    {
        $this->assertNull(TypeConverter::toFloat(null));
    }

    public function testToBoolConvertsDigistore24Format(): void
    {
        // Digistore24 uses Y/N and 1/0
        $this->assertTrue(TypeConverter::toBool('Y'));
        $this->assertFalse(TypeConverter::toBool('N'));
        $this->assertTrue(TypeConverter::toBool('1'));
        $this->assertFalse(TypeConverter::toBool('0'));
        $this->assertTrue(TypeConverter::toBool(1));
        $this->assertFalse(TypeConverter::toBool(0));
    }

    public function testToBoolReturnsBoolAsIs(): void
    {
        $this->assertTrue(TypeConverter::toBool(true));
        $this->assertFalse(TypeConverter::toBool(false));
    }

    public function testToBoolReturnsNullForNull(): void
    {
        $this->assertNull(TypeConverter::toBool(null));
    }

    public function testToDateTimeConvertsString(): void
    {
        $result = TypeConverter::toDateTime('2024-01-15 10:30:45');
        $this->assertInstanceOf(\DateTimeImmutable::class, $result);
        $this->assertSame('2024-01-15 10:30:45', $result->format('Y-m-d H:i:s'));
    }

    public function testToDateTimeReturnsDateTimeAsIs(): void
    {
        $date = new \DateTimeImmutable('2024-01-15');
        $this->assertSame($date, TypeConverter::toDateTime($date));
    }

    public function testToDateTimeReturnsNullForNull(): void
    {
        $this->assertNull(TypeConverter::toDateTime(null));
    }

    public function testToDateTimeConvertsTimestamp(): void
    {
        $timestamp = 1705320645; // 2024-01-15 10:30:45 UTC
        $result = TypeConverter::toDateTime($timestamp);
        $this->assertInstanceOf(\DateTimeImmutable::class, $result);
        $this->assertSame($timestamp, $result->getTimestamp());
    }

    public function testToArrayConvertsJsonString(): void
    {
        $data = ['key' => 'value', 'number' => 42];
        $json = json_encode($data);
        $this->assertIsString($json);

        // Manual decode in test
        $manualDecode = json_decode($json, true);
        $manualError = json_last_error();
        $manualErrorMsg = json_last_error_msg();

        //  Check TypeConverter source
        $reflection = new \ReflectionClass(TypeConverter::class);
        $sourceFile = $reflection->getFileName();

        // TypeConverter test
        $result = TypeConverter::toArray($json);

        // Detailed failure message
        if (! isset($result['key'])) {
            $message = sprintf(
                "TypeConverter::toArray() test failed:\n" .
                "  Source file: %s\n" .
                "  Input JSON: %s\n" .
                "  TypeConverter returned: %s\n" .
                "  Manual decode: %s\n" .
                "  Manual decode error: %d (%s)\n",
                $sourceFile,
                $json,
                print_r($result, true),
                print_r($manualDecode, true),
                $manualError,
                $manualErrorMsg,
            );
            $this->fail($message);
        }        $this->assertArrayHasKey('key', $result);
        $this->assertSame('value', $result['key']);
        $this->assertArrayHasKey('number', $result);
        $this->assertSame(42, $result['number']);
    }

    public function testToArrayReturnsArrayAsIs(): void
    {
        $array = ['key' => 'value'];
        $this->assertSame($array, TypeConverter::toArray($array));
    }

    public function testToArrayReturnsEmptyArrayForNull(): void
    {
        $this->assertSame([], TypeConverter::toArray(null, []));
    }

    public function testToStringConvertsToString(): void
    {
        $this->assertSame('42', TypeConverter::toString(42));
        $this->assertSame('42.5', TypeConverter::toString(42.5));
        $this->assertSame('test', TypeConverter::toString('test'));
    }

    public function testToStringReturnsEmptyStringForNull(): void
    {
        $result = TypeConverter::toString(null, '');
        $this->assertSame('', $result);
    }
}
