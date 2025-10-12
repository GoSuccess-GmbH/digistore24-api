<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Tests\Unit\Utils;

use GoSuccess\Digistore24\Util\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testIsEmailValidatesEmailFormat(): void
    {
        $this->assertTrue(Validator::isEmail('test@example.com'));
        $this->assertTrue(Validator::isEmail('user.name+tag@example.co.uk'));
        
        $this->assertFalse(Validator::isEmail('invalid'));
        $this->assertFalse(Validator::isEmail('test@'));
        $this->assertFalse(Validator::isEmail('@example.com'));
    }

    public function testIsUrlValidatesUrlFormat(): void
    {
        $this->assertTrue(Validator::isUrl('https://example.com'));
        $this->assertTrue(Validator::isUrl('http://domain.co.uk/path'));
        $this->assertTrue(Validator::isUrl('https://sub.domain.com/path?query=value'));
        
        $this->assertFalse(Validator::isUrl('not-a-url'));
        $this->assertFalse(Validator::isUrl('invalid format'));
    }

    public function testIsApiKeyValidatesFormat(): void
    {
        $this->assertTrue(Validator::isApiKey('ABC-12345678901234567'));
        $this->assertTrue(Validator::isApiKey('XYZ-ABCDEFGHIJKLMNOPQ'));
        
        $this->assertFalse(Validator::isApiKey('invalid'));
        $this->assertFalse(Validator::isApiKey('ABC123'));
        $this->assertFalse(Validator::isApiKey('ABC-123')); // Too short
    }

    public function testIsCountryCodeValidatesFormat(): void
    {
        $this->assertTrue(Validator::isCountryCode('US'));
        $this->assertTrue(Validator::isCountryCode('DE'));
        $this->assertTrue(Validator::isCountryCode('GB'));
        
        $this->assertFalse(Validator::isCountryCode('USA'));
        $this->assertFalse(Validator::isCountryCode('us'));
        $this->assertFalse(Validator::isCountryCode('1'));
    }

    public function testIsCurrencyCodeValidatesFormat(): void
    {
        $this->assertTrue(Validator::isCurrencyCode('USD'));
        $this->assertTrue(Validator::isCurrencyCode('EUR'));
        $this->assertTrue(Validator::isCurrencyCode('GBP'));
        
        $this->assertFalse(Validator::isCurrencyCode('US'));
        $this->assertFalse(Validator::isCurrencyCode('usd'));
        $this->assertFalse(Validator::isCurrencyCode('EURO'));
    }

    public function testIsLengthValidatesStringLength(): void
    {
        $this->assertTrue(Validator::isLength('hello', 3, 10));
        $this->assertTrue(Validator::isLength('test', 4, 4));
        
        $this->assertFalse(Validator::isLength('hi', 3, 10));
        $this->assertFalse(Validator::isLength('this is too long', 1, 10));
    }

    public function testValidateWithRequiredRule(): void
    {
        $data = ['name' => 'John'];
        $rules = [
            'name' => 'required',
            'email' => 'required'
        ];

        $errors = Validator::validate($data, $rules);

        $this->assertArrayNotHasKey('name', $errors);
        $this->assertArrayHasKey('email', $errors);
        $this->assertStringContainsString('required', $errors['email']);
    }

    public function testValidateWithEmailRule(): void
    {
        $data = [
            'valid' => 'test@example.com',
            'invalid' => 'not-an-email'
        ];
        $rules = [
            'valid' => 'email',
            'invalid' => 'email'
        ];

        $errors = Validator::validate($data, $rules);

        $this->assertArrayNotHasKey('valid', $errors);
        $this->assertArrayHasKey('invalid', $errors);
        $this->assertStringContainsString('email', $errors['invalid']);
    }

    public function testValidateWithUrlRule(): void
    {
        $data = [
            'valid' => 'https://example.com',
            'invalid' => 'not-a-url'
        ];
        $rules = [
            'valid' => 'url',
            'invalid' => 'url'
        ];

        $errors = Validator::validate($data, $rules);

        $this->assertArrayNotHasKey('valid', $errors);
        $this->assertArrayHasKey('invalid', $errors);
    }

    public function testValidateWithMinRule(): void
    {
        $data = [
            'valid' => 'hello',
            'invalid' => 'hi'
        ];
        $rules = [
            'valid' => 'min:3',
            'invalid' => 'min:3'
        ];

        $errors = Validator::validate($data, $rules);

        $this->assertArrayNotHasKey('valid', $errors);
        $this->assertArrayHasKey('invalid', $errors);
    }

    public function testValidateWithMaxRule(): void
    {
        $data = [
            'valid' => 'hello',
            'invalid' => 'this is too long'
        ];
        $rules = [
            'valid' => 'max:10',
            'invalid' => 'max:10'
        ];

        $errors = Validator::validate($data, $rules);

        $this->assertArrayNotHasKey('valid', $errors);
        $this->assertArrayHasKey('invalid', $errors);
    }

    public function testValidateWithMultipleRules(): void
    {
        $data = [
            'email' => 'test@example.com',
            'name' => ''
        ];
        $rules = [
            'email' => 'required|email',
            'name' => 'required|min:2'
        ];

        $errors = Validator::validate($data, $rules);

        $this->assertArrayNotHasKey('email', $errors);
        $this->assertArrayHasKey('name', $errors);
    }
}
