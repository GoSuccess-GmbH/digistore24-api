<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Trait;

use GoSuccess\Digistore24\Api\Contract\IntBackedEnum;
use GoSuccess\Digistore24\Api\Trait\IntBackedEnumTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Test enum for IntBackedEnumTrait
 */
enum TestPriority: int implements IntBackedEnum
{
    use IntBackedEnumTrait;

    case LOW = 1;
    case MEDIUM = 2;
    case HIGH = 3;
    case CRITICAL = 4;

    public function label(): string
    {
        return match ($this) {
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
            self::CRITICAL => 'Critical',
        };
    }
}

#[CoversClass(IntBackedEnumTrait::class)]
final class IntBackedEnumTraitTest extends TestCase
{
    /**
     * @return array<string, array{int, TestPriority|null}>
     */
    public static function fromIntProvider(): array
    {
        return [
            'valid low' => [1, TestPriority::LOW],
            'valid medium' => [2, TestPriority::MEDIUM],
            'valid high' => [3, TestPriority::HIGH],
            'valid critical' => [4, TestPriority::CRITICAL],
            'invalid value' => [5, null],
            'invalid zero' => [0, null],
            'invalid negative' => [-1, null],
        ];
    }

    #[DataProvider('fromIntProvider')]
    public function testFromInt(int $input, ?TestPriority $expected): void
    {
        $result = TestPriority::fromInt($input);
        $this->assertSame($expected, $result);
    }

    public function testFromIntWithNull(): void
    {
        $result = TestPriority::fromInt(null);
        $this->assertNull($result);
    }

    /**
     * @return array<string, array{int|null, bool}>
     */
    public static function isValidProvider(): array
    {
        return [
            'valid 1' => [1, true],
            'valid 2' => [2, true],
            'valid 3' => [3, true],
            'valid 4' => [4, true],
            'invalid 5' => [5, false],
            'invalid 0' => [0, false],
            'invalid negative' => [-1, false],
            'null value' => [null, false],
        ];
    }

    #[DataProvider('isValidProvider')]
    public function testIsValid(?int $value, bool $expected): void
    {
        $result = TestPriority::isValid($value);
        $this->assertSame($expected, $result);
    }

    public function testValues(): void
    {
        $values = TestPriority::values();

        $this->assertCount(4, $values);
        $this->assertContains(1, $values);
        $this->assertContains(2, $values);
        $this->assertContains(3, $values);
        $this->assertContains(4, $values);
    }

    public function testLabels(): void
    {
        $labels = TestPriority::labels();

        $this->assertCount(4, $labels);
        $this->assertSame('Low', $labels[1]);
        $this->assertSame('Medium', $labels[2]);
        $this->assertSame('High', $labels[3]);
        $this->assertSame('Critical', $labels[4]);
    }

    public function testLabelsKeysMatchValues(): void
    {
        $labels = TestPriority::labels();
        $values = TestPriority::values();

        $this->assertSame($values, array_keys($labels));
    }

    public function testLabel(): void
    {
        $this->assertSame('Low', TestPriority::LOW->label());
        $this->assertSame('Medium', TestPriority::MEDIUM->label());
        $this->assertSame('High', TestPriority::HIGH->label());
        $this->assertSame('Critical', TestPriority::CRITICAL->label());
    }
}
