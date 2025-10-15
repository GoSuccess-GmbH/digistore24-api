# Developer Experience Setup

This guide helps you set up your development environment for the best experience when working with this project.

## 📋 Prerequisites

- **PHP 8.4+** (Required)
- **Composer** (Package Manager)
- **Git** (Version Control)

## 🔧 IDE Setup

### Visual Studio Code (Recommended)

1. **Install Recommended Extensions**

   When you open the project, VS Code will prompt you to install recommended extensions. Accept the prompt or install manually:

   - **Intelephense** - PHP IntelliSense
   - **PHP Debug** - XDebug integration
   - **EditorConfig** - Consistent editor settings
   - **PHP CS Fixer** - Code formatting
   - **PHPStan** - Static analysis
   - **PHP DocBlocker** - Auto-generate PHPDoc comments
   - **PHP Namespace Resolver** - Import classes
   - **PHPUnit Test Explorer** - Run tests in sidebar

2. **Settings are Pre-configured**

   The `.vscode/settings.json` file contains:
   - Format on save with PHP CS Fixer
   - PHPStan integration
   - 120 character line limit
   - 4-space indentation
   - LF line endings

3. **Debugging Setup**

   XDebug configuration is ready in `.vscode/launch.json`. Install XDebug and you can:
   - Set breakpoints
   - Step through code
   - Inspect variables

   Press `F5` to start debugging.

### PHPStorm / IntelliJ IDEA

1. **Import Code Style**

   PHPStorm will automatically detect `.idea/codeStyles/Project.xml` and use PSR-12 style with project-specific rules.

2. **Configure Tools**

   Settings are pre-configured in `.idea/php.xml`:
   - PHP CS Fixer: `vendor/bin/php-cs-fixer`
   - PHPStan: `vendor/bin/phpstan`
   - PHPUnit: `vendor/bin/phpunit`

3. **Enable Quality Tools**

   Go to: `Settings → PHP → Quality Tools` and enable:
   - PHP CS Fixer (auto-format on save)
   - PHPStan (real-time analysis)
   - PHPUnit (test runner)

## 🎨 EditorConfig

The `.editorconfig` file ensures consistent formatting across all editors:

```ini
[*.php]
indent_style = space
indent_size = 4
max_line_length = 120
charset = utf-8
end_of_line = lf
insert_final_newline = true
trim_trailing_whitespace = true
```

Most modern editors support EditorConfig automatically.

## 🧪 Running Tests

### Command Line
```bash
# Run all tests
composer test

# Run specific test suite
composer test:unit
composer test:integration

# Run with coverage (slower)
composer test:coverage

# Run specific test file
vendor/bin/phpunit tests/Unit/Http/ResponseTest.php
```

### VS Code
- Use the **Testing** sidebar (Flask icon)
- Run/debug individual tests with CodeLens buttons above test methods
- View test results inline

### PHPStorm
- Right-click any test class/method → Run
- Use the test runner panel for visual test management
- Run with coverage enabled for coverage reports

## 🔍 Code Quality Checks

### Before Committing

```bash
# Fix code style automatically
composer cs:fix

# Check for issues without fixing
composer cs:check

# Run static analysis
composer analyse

# Run all checks
composer check
```

### Continuous Integration

All checks run automatically on GitHub Actions:
- ✅ PHP CS Fixer (PSR-12 compliance)
- ✅ PHPStan Level Max (static analysis)
- ✅ PHPUnit (all test suites)
- ✅ Code coverage reporting

## 📝 Writing Code

### PHP 8.4 Features

This project uses modern PHP 8.4 features:

```php
// ✅ Property Hooks (instead of getters/setters)
public string $email {
    set {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email');
        }
        $this->email = $value;
    }
}

// ✅ Typed Properties
public readonly int $statusCode;

// ✅ Constructor Property Promotion
public function __construct(
    private readonly Configuration $config,
) {}

// ✅ Enums
enum HttpMethod: string {
    case GET = 'GET';
    case POST = 'POST';
}

// ✅ Match Expressions
return match ($statusCode) {
    HttpStatusCode::OK => 'Success',
    HttpStatusCode::NOT_FOUND => 'Not Found',
    default => 'Unknown',
};
```

### Type Hints

**Always use type hints:**

```php
// ✅ Good
public function getProduct(int $productId): ProductResponse
{
    // ...
}

// ❌ Bad
public function getProduct($productId)
{
    // ...
}
```

### PHPDoc Comments

**Add PHPDoc for:**
- Complex array structures
- Generic types
- When return type needs clarification

```php
/**
 * Get products with filtering
 *
 * @param array{
 *     status?: string,
 *     limit?: int,
 *     offset?: int
 * } $filters Optional filters
 * @return list<Product> List of products
 */
public function getProducts(array $filters = []): array
```

### Naming Conventions

```php
// Classes: PascalCase
class CreateBuyUrlRequest {}

// Methods/Variables: camelCase
public function createBuyUrl() {}
private string $apiKey;

// Constants: SCREAMING_SNAKE_CASE
private const int DEFAULT_TIMEOUT = 30;

// Enums: PascalCase with values
enum HttpStatusCode: int {
    case OK = 200;
}
```

## 🐛 Debugging Tips

### XDebug Configuration

Add to `php.ini`:

```ini
[XDebug]
xdebug.mode=debug,develop
xdebug.start_with_request=yes
xdebug.client_port=9003
```

### Common Issues

**"Class not found"**
```bash
composer dump-autoload
```

**"Tests not running"**
```bash
# Verify PHP version
php -v  # Should be 8.4+

# Clear test cache
rm -rf .phpunit.cache
```

**"Code style errors"**
```bash
# Auto-fix most issues
composer cs:fix

# Check what will be fixed
composer cs:check
```

## 📚 Additional Resources

- [ARCHITECTURE.md](../ARCHITECTURE.md) - Project architecture
- [CONTRIBUTING.md](../CONTRIBUTING.md) - Contribution guidelines
- [README.md](../README.md) - Main documentation
- [PHP 8.4 Features](https://www.php.net/releases/8.4/en.php)
- [PSR-12 Coding Style](https://www.php-fig.org/psr/psr-12/)

## 🤝 Getting Help

- **Issues**: Check existing issues or create a new one
- **Discussions**: Use GitHub Discussions for questions
- **Documentation**: All endpoints documented in `/docs` folder

---

**Happy Coding! 🚀**
