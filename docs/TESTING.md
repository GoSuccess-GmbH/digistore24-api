# Testing Guide

This document describes the testing strategy and setup for the Digistore24 API Client.

## Table of Contents

- [Overview](#overview)
- [Test Types](#test-types)
- [Running Tests](#running-tests)
- [Code Coverage](#code-coverage)
- [Writing Tests](#writing-tests)
- [Continuous Integration](#continuous-integration)

## Overview

The project uses **PHPUnit 11.x** for testing with a comprehensive test suite covering:

- **Unit Tests**: 1035+ tests testing individual components
- **Integration Tests**: Tests with mocked HTTP responses
- **Code Coverage**: Tracking test coverage metrics
- **Static Analysis**: PHPStan Level 9 for type safety

### Current Test Statistics

- **Tests**: 1035 tests
- **Assertions**: 2116 assertions
- **Code Coverage**: ~98% (lines)
- **PHPStan Level**: 9 (maximum)

## Test Types

### Unit Tests (`tests/Unit/`)

Test individual classes and methods in isolation:

```php
<?php

namespace GoSuccess\Digistore24\Api\Tests\Unit\Request;

use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
use PHPUnit\Framework\TestCase;

class CreateBuyUrlRequestTest extends TestCase
{
    public function testCanSetProductId(): void
    {
        $request = new CreateBuyUrlRequest();
        $request->productId = 12345;
        
        $this->assertSame(12345, $request->productId);
    }
}
```

### Integration Tests (`tests/Integration/`)

Test complete workflows with mocked HTTP responses:

```php
<?php

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use PHPUnit\Framework\TestCase;

class BuyUrlWorkflowTest extends TestCase
{
    public function testCreateAndListBuyUrls(): void
    {
        $config = new Configuration(apiKey: 'test-key');
        $client = new Digistore24($config);
        
        // Mock HTTP client responses
        // Test complete workflow
    }
}
```

## Running Tests

### All Tests

```bash
# Run all tests (fast, no coverage)
composer test

# Run all tests with coverage (requires Xdebug/PCOV)
composer test:coverage
```

### Specific Test Suites

```bash
# Run only unit tests
composer test:unit

# Run only integration tests
composer test:integration

# Run specific test file
vendor/bin/phpunit tests/Unit/Client/ConfigurationTest.php

# Run specific test method
vendor/bin/phpunit --filter testCanCreateConfiguration
```

### Test Options

```bash
# Run with verbose output
vendor/bin/phpunit --testdox

# Stop on first failure
vendor/bin/phpunit --stop-on-failure

# Run tests in random order
vendor/bin/phpunit --order-by=random
```

## Code Coverage

### Prerequisites

To generate code coverage reports, you need either **Xdebug** or **PCOV** installed.

#### Install PCOV (Recommended - Faster)

**Windows (Laragon/XAMPP):**
1. Download PCOV from [PECL](https://pecl.php.net/package/pcov)
2. Extract `php_pcov.dll` to `C:\laragon\bin\php\php-8.4.x\ext\`
3. Add to `php.ini`:
   ```ini
   [pcov]
   extension=pcov
   pcov.enabled=1
   pcov.directory=.
   ```
4. Restart PHP: `php -m | grep pcov`

**macOS/Linux:**
```bash
pecl install pcov
echo "extension=pcov.so" >> $(php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||")
```

#### Install Xdebug (Alternative)

**Windows:**
1. Download from [Xdebug.org](https://xdebug.org/download)
2. Follow installation wizard instructions
3. Add to `php.ini`:
   ```ini
   [xdebug]
   zend_extension=xdebug
   xdebug.mode=coverage
   ```

**macOS/Linux:**
```bash
pecl install xdebug
echo "zend_extension=xdebug.so" >> $(php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||")
echo "xdebug.mode=coverage" >> $(php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||")
```

### Generate Coverage Reports

```bash
# HTML report (opens in browser)
composer test:coverage

# Text report in terminal
vendor/bin/phpunit --coverage-text

# XML report (for CI/CD)
vendor/bin/phpunit --coverage-clover coverage.xml

# All formats
vendor/bin/phpunit --coverage-html build/coverage \
                   --coverage-clover build/logs/clover.xml \
                   --coverage-text
```

### Coverage Reports Location

After running `composer test:coverage`:

- **HTML Report**: `build/coverage/index.html` - Open in browser
- **XML Report**: `build/logs/clover.xml` - For CI/CD tools
- **Text Report**: Displayed in terminal

### Coverage Thresholds

The project enforces minimum coverage thresholds in `phpunit.xml`:

```xml
<coverage>
    <report>
        <html outputDirectory="build/coverage"/>
        <clover outputFile="build/logs/clover.xml"/>
    </report>
</coverage>
```

**Current Coverage Targets:**
- Lines: 95%+
- Functions: 98%+
- Classes: 100%

## Writing Tests

### Test Structure

Follow PHPUnit best practices:

```php
<?php

namespace GoSuccess\Digistore24\Api\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(YourClass::class)]
class YourClassTest extends TestCase
{
    private YourClass $subject;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new YourClass();
    }
    
    protected function tearDown(): void
    {
        parent::tearDown();
    }
    
    public function testItDoesSomething(): void
    {
        // Arrange
        $input = 'test';
        
        // Act
        $result = $this->subject->doSomething($input);
        
        // Assert
        $this->assertSame('expected', $result);
    }
}
```

### Naming Conventions

- Test classes: `{ClassName}Test.php`
- Test methods: `test{Behavior}()` or `testIt{Does}{Something}()`
- Use descriptive names: `testThrowsExceptionWhenApiKeyIsEmpty()`

### Assertions

Common PHPUnit assertions:

```php
// Equality
$this->assertSame($expected, $actual);      // Strict equality (===)
$this->assertEquals($expected, $actual);    // Loose equality (==)

// Types
$this->assertIsString($value);
$this->assertIsInt($value);
$this->assertInstanceOf(ClassName::class, $object);

// Booleans
$this->assertTrue($condition);
$this->assertFalse($condition);

// Arrays
$this->assertCount(3, $array);
$this->assertContains('item', $array);
$this->assertArrayHasKey('key', $array);

// Exceptions
$this->expectException(ValidationException::class);
$this->expectExceptionMessage('Invalid API key');
```

### Data Providers

Use data providers for multiple test cases:

```php
/**
 * @dataProvider validEmailProvider
 */
public function testValidatesEmails(string $email, bool $expected): void
{
    $result = $this->validator->isValid($email);
    $this->assertSame($expected, $result);
}

public static function validEmailProvider(): array
{
    return [
        ['test@example.com', true],
        ['invalid-email', false],
        ['', false],
    ];
}
```

### Mocking

Use PHPUnit mocks for dependencies:

```php
public function testCallsApiClient(): void
{
    $mockClient = $this->createMock(ApiClient::class);
    $mockClient->expects($this->once())
               ->method('post')
               ->with('/endpoint', ['data' => 'value'])
               ->willReturn(['result' => 'success']);
    
    $service = new YourService($mockClient);
    $result = $service->doSomething();
    
    $this->assertSame('success', $result);
}
```

## Continuous Integration

### GitHub Actions

Tests run automatically on every push and pull request:

```yaml
name: Tests
on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.4'
          coverage: pcov
      - run: composer install
      - run: composer test:coverage
```

### Coverage Badges

Coverage badge in README.md:

![Coverage](https://img.shields.io/badge/Coverage-98%25-brightgreen)

Generated from coverage reports in CI/CD pipeline.

## Troubleshooting

### Common Issues

**"No code coverage driver available"**
```bash
# Install PCOV or Xdebug
pecl install pcov
php -m | grep pcov
```

**"Class not found"**
```bash
# Regenerate autoloader
composer dump-autoload
```

**"Tests are slow"**
```bash
# Use PCOV instead of Xdebug (5-10x faster)
# Or run without coverage:
composer test
```

**"Memory limit exceeded"**
```bash
# Increase PHP memory limit
php -d memory_limit=512M vendor/bin/phpunit
```

## Best Practices

1. ✅ **Write tests first** (TDD) or alongside feature code
2. ✅ **One assertion per test** (ideally, or related assertions)
3. ✅ **Use descriptive test names** that explain the behavior
4. ✅ **Keep tests simple** - tests shouldn't need tests
5. ✅ **Mock external dependencies** (HTTP, Database, etc.)
6. ✅ **Test edge cases** (null, empty, invalid input)
7. ✅ **Aim for >95% coverage** but focus on meaningful tests
8. ✅ **Run tests before commits** (`composer check`)

## Resources

- [PHPUnit Documentation](https://phpunit.de/documentation.html)
- [PCOV Documentation](https://github.com/krakjoe/pcov)
- [Xdebug Documentation](https://xdebug.org/docs/code_coverage)
- [PHP Testing Best Practices](https://phpunit.de/best-practices.html)
