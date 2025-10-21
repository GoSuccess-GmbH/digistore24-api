<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Trait;

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Test enum for StringBackedEnumTrait
 */
enum TestStatus: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::PENDING => 'Pending',
        };
    }
}

#[CoversClass(StringBackedEnumTrait::class)]
final class StringBackedEnumTraitTest extends TestCase
{
    /**
     * @return array<string, array{string, TestStatus|null}>
     */
    public static function fromStringProvider(): array
    {
        return [
            'exact match uppercase' => ['ACTIVE', TestStatus::ACTIVE],
            'exact match lowercase' => ['inactive', TestStatus::INACTIVE],
            'exact match mixed case' => ['PeNdInG', TestStatus::PENDING],
            'with whitespace' => ['  active  ', TestStatus::ACTIVE],
            'invalid value' => ['unknown', null],
            'empty string' => ['', null],
        ];
    }

    #[DataProvider('fromStringProvider')]
    public function testFromString(string $input, ?TestStatus $expected): void
    {
        $result = TestStatus::fromString($input);
        $this->assertSame($expected, $result);
    }

    public function testFromStringWithNull(): void
    {
        $result = TestStatus::fromString(null);
        $this->assertNull($result);
    }

    /**
     * @return array<string, array{string|null, bool}>
     */
    public static function isValidProvider(): array
    {
        return [
            'valid active' => ['active', true],
            'valid inactive uppercase' => ['INACTIVE', true],
            'valid pending mixed case' => ['PeNdInG', true],
            'valid with whitespace' => ['  active  ', true],
            'invalid value' => ['unknown', false],
            'empty string' => ['', false],
            'null value' => [null, false],
        ];
    }

    #[DataProvider('isValidProvider')]
    public function testIsValid(?string $value, bool $expected): void
    {
        $result = TestStatus::isValid($value);
        $this->assertSame($expected, $result);
    }

    public function testValues(): void
    {
        $values = TestStatus::values();

        $this->assertCount(3, $values);
        $this->assertContains('active', $values);
        $this->assertContains('inactive', $values);
        $this->assertContains('pending', $values);
    }

    public function testLabels(): void
    {
        $labels = TestStatus::labels();

        $this->assertCount(3, $labels);
        $this->assertSame('Active', $labels['active']);
        $this->assertSame('Inactive', $labels['inactive']);
        $this->assertSame('Pending', $labels['pending']);
    }

    public function testLabelsKeysMatchValues(): void
    {
        $labels = TestStatus::labels();
        $values = TestStatus::values();

        $this->assertSame($values, array_keys($labels));
    }

    public function testFromStringIsCaseInsensitive(): void
    {
        $lower = TestStatus::fromString('active');
        $upper = TestStatus::fromString('ACTIVE');
        $mixed = TestStatus::fromString('AcTiVe');

        $this->assertSame($lower, $upper);
        $this->assertSame($lower, $mixed);
        $this->assertSame(TestStatus::ACTIVE, $lower);
    }

    public function testFromStringTrimsWhitespace(): void
    {
        $result = TestStatus::fromString('  active  ');

        $this->assertSame(TestStatus::ACTIVE, $result);
    }
}
