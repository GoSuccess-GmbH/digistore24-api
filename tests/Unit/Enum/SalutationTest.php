<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Enum;

use GoSuccess\Digistore24\Api\Enum\Salutation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Salutation::class)]
final class SalutationTest extends TestCase
{
    public function testMrsHasCorrectValue(): void
    {
        $this->assertSame('F', Salutation::Mrs->value);
    }

    public function testMrHasCorrectValue(): void
    {
        $this->assertSame('M', Salutation::Mr->value);
    }

    public function testNoneHasCorrectValue(): void
    {
        $this->assertSame('', Salutation::None->value);
    }

    public function testMrsLabelIsCorrect(): void
    {
        $this->assertSame('Mrs', Salutation::Mrs->label());
    }

    public function testMrLabelIsCorrect(): void
    {
        $this->assertSame('Mr', Salutation::Mr->label());
    }

    public function testNoneLabelIsCorrect(): void
    {
        $this->assertSame('None', Salutation::None->label());
    }

    /**
     * @param string $input
     * @param Salutation|null $expected
     */
    #[DataProvider('fromStringProvider')]
    public function testFromString(string $input, ?Salutation $expected): void
    {
        $result = Salutation::fromString($input);
        $this->assertSame($expected, $result);
    }

    /**
     * @return array<string, array{input: string, expected: Salutation|null}>
     */
    public static function fromStringProvider(): array
    {
        return [
            'uppercase F' => ['input' => 'F', 'expected' => Salutation::Mrs],
            'lowercase f' => ['input' => 'f', 'expected' => Salutation::Mrs],
            'uppercase M' => ['input' => 'M', 'expected' => Salutation::Mr],
            'lowercase m' => ['input' => 'm', 'expected' => Salutation::Mr],
            'empty string' => ['input' => '', 'expected' => Salutation::None],
            'whitespace only' => ['input' => '   ', 'expected' => Salutation::None],
            'invalid value X' => ['input' => 'X', 'expected' => null],
            'invalid value Mrs' => ['input' => 'Mrs', 'expected' => null],
            'invalid value Mr' => ['input' => 'Mr', 'expected' => null],
        ];
    }

    public function testFromStringReturnsNullForNull(): void
    {
        $result = Salutation::fromString(null);
        $this->assertNull($result);
    }

    /**
     * @param string|null $input
     * @param bool $expected
     */
    #[DataProvider('isValidProvider')]
    public function testIsValid(?string $input, bool $expected): void
    {
        $result = Salutation::isValid($input);
        $this->assertSame($expected, $result);
    }

    /**
     * @return array<string, array{input: string|null, expected: bool}>
     */
    public static function isValidProvider(): array
    {
        return [
            'uppercase F is valid' => ['input' => 'F', 'expected' => true],
            'lowercase f is valid' => ['input' => 'f', 'expected' => true],
            'uppercase M is valid' => ['input' => 'M', 'expected' => true],
            'lowercase m is valid' => ['input' => 'm', 'expected' => true],
            'empty string is valid' => ['input' => '', 'expected' => true],
            'whitespace becomes empty and is valid' => ['input' => '   ', 'expected' => true],
            'X is invalid' => ['input' => 'X', 'expected' => false],
            'Mrs is invalid' => ['input' => 'Mrs', 'expected' => false],
            'Mr is invalid' => ['input' => 'Mr', 'expected' => false],
            'null is invalid' => ['input' => null, 'expected' => false],
        ];
    }

    public function testAllCasesCanBeLabeledWithoutError(): void
    {
        foreach (Salutation::cases() as $case) {
            $label = $case->label();
            $this->assertNotEmpty($label);
        }
    }

    public function testEnumHasExactlyThreeCases(): void
    {
        $cases = Salutation::cases();
        $this->assertCount(3, $cases);
    }

    public function testEnumCasesAreCorrect(): void
    {
        $cases = Salutation::cases();
        $this->assertContains(Salutation::Mrs, $cases);
        $this->assertContains(Salutation::Mr, $cases);
        $this->assertContains(Salutation::None, $cases);
    }
}
