<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Unit\Utils;

use GoSuccess\Digistore24\Api\Util\ArrayHelper;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ArrayHelper::class)]
final class ArrayHelperTest extends TestCase
{
    public function testGetRetrievesNestedValue(): void
    {
        $array = [
            'user' => [
                'name' => 'John',
                'address' => [
                    'city' => 'Berlin',
                ],
            ],
        ];

        $this->assertSame('John', ArrayHelper::get($array, 'user.name'));
        $this->assertSame('Berlin', ArrayHelper::get($array, 'user.address.city'));
    }

    public function testGetReturnsDefaultForMissingKey(): void
    {
        $array = ['key' => 'value'];

        $this->assertSame('default', ArrayHelper::get($array, 'missing', 'default'));
        $this->assertNull(ArrayHelper::get($array, 'missing'));
    }

    public function testSetCreatesNestedArray(): void
    {
        $array = [];

        ArrayHelper::set($array, 'user.name', 'John');
        ArrayHelper::set($array, 'user.address.city', 'Berlin');

        $user = $array['user'] ?? null;
        $this->assertIsArray($user);
        /** @var array<string, mixed> $validatedUser */
        $validatedUser = $user;
        $this->assertSame('John', $validatedUser['name']);

        $address = $validatedUser['address'] ?? null;
        $this->assertIsArray($address);
        /** @var array<string, mixed> $validatedAddress */
        $validatedAddress = $address;
        $this->assertSame('Berlin', $validatedAddress['city']);
    }

    public function testHasChecksNestedKey(): void
    {
        $array = [
            'user' => [
                'name' => 'John',
            ],
        ];

        $this->assertTrue(ArrayHelper::has($array, 'user.name'));
        $this->assertFalse(ArrayHelper::has($array, 'user.email'));
    }

    public function testKeysToCamelCaseConvertsKeys(): void
    {
        $array = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'john@example.com',
        ];

        $result = ArrayHelper::keysToCamelCase($array);

        $this->assertArrayHasKey('firstName', $result);
        $this->assertArrayHasKey('lastName', $result);
        $this->assertArrayHasKey('emailAddress', $result);
        $this->assertSame('John', $result['firstName']);
    }

    public function testKeysToSnakeCaseConvertsKeys(): void
    {
        $array = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'emailAddress' => 'john@example.com',
        ];

        $result = ArrayHelper::keysToSnakeCase($array);

        $this->assertArrayHasKey('first_name', $result);
        $this->assertArrayHasKey('last_name', $result);
        $this->assertArrayHasKey('email_address', $result);
        $this->assertSame('John', $result['first_name']);
    }

    public function testToCamelCaseConvertsString(): void
    {
        $this->assertSame('firstName', ArrayHelper::toCamelCase('first_name'));
        $this->assertSame('emailAddress', ArrayHelper::toCamelCase('email_address'));
        $this->assertSame('userId', ArrayHelper::toCamelCase('user_id'));
    }

    public function testToSnakeCaseConvertsString(): void
    {
        $this->assertSame('first_name', ArrayHelper::toSnakeCase('firstName'));
        $this->assertSame('email_address', ArrayHelper::toSnakeCase('emailAddress'));
        $this->assertSame('user_id', ArrayHelper::toSnakeCase('userId'));
    }

    public function testFlattenFlattenNestedArray(): void
    {
        $array = [
            'user' => [
                'name' => 'John',
                'address' => [
                    'city' => 'Berlin',
                ],
            ],
        ];

        $result = ArrayHelper::flatten($array);

        $this->assertSame('John', $result['user.name']);
        $this->assertSame('Berlin', $result['user.address.city']);
    }

    public function testRemoveNullsRemovesNullValues(): void
    {
        $array = [
            'name' => 'John',
            'email' => null,
            'age' => 30,
            'address' => null,
        ];

        $result = ArrayHelper::removeNulls($array);

        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('age', $result);
        $this->assertArrayNotHasKey('email', $result);
        $this->assertArrayNotHasKey('address', $result);
    }

    public function testOnlyReturnsOnlySpecifiedKeys(): void
    {
        $array = [
            'name' => 'John',
            'email' => 'john@example.com',
            'age' => 30,
            'city' => 'Berlin',
        ];

        $result = ArrayHelper::only($array, ['name', 'email']);

        $this->assertCount(2, $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('email', $result);
        $this->assertArrayNotHasKey('age', $result);
    }

    public function testExceptReturnsAllExceptSpecifiedKeys(): void
    {
        $array = [
            'name' => 'John',
            'email' => 'john@example.com',
            'age' => 30,
            'city' => 'Berlin',
        ];

        $result = ArrayHelper::except($array, ['age', 'city']);

        $this->assertCount(2, $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('email', $result);
        $this->assertArrayNotHasKey('age', $result);
    }
}
