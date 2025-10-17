# String-Backed Enum Interface & Trait

## Overview

The Digistore24 API Client uses a standardized approach for all string-backed enums through an **Interface + Trait pattern**. This ensures consistency, type-safety, and reduces code duplication.

## Architecture

### Components

1. **`StringBackedEnum` Interface** (`src/Contract/StringBackedEnum.php`)
   - Defines the contract that all string-backed enums must implement
   - Enforces consistent method signatures across all enums
   - Provides type-safety and PHPStan compliance

2. **`StringBackedEnumTrait` Trait** (`src/Trait/StringBackedEnumTrait.php`)
   - Provides default implementations for common enum operations
   - Handles case-insensitive string conversion
   - Adds convenience methods like `values()` and `labels()`

### Why This Approach?

**PHP 8.4 doesn't provide built-in enum utilities** for string conversion, validation, or labeling. This pattern:

- ✅ **Type-safe**: Interface contract enforces method implementation
- ✅ **DRY**: Trait provides reusable implementation
- ✅ **Consistent**: All enums have the same API
- ✅ **Flexible**: Each enum can customize behavior if needed
- ✅ **PHPStan Level 9 compliant**: Full static analysis support

## Usage

### Implementing a New Enum

```php
<?php

use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

enum Status: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';

    // Only label() needs custom implementation
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::PENDING => 'Pending',
        };
    }
}
```

### Available Methods

#### Instance Methods

**`label(): string`**
- Returns human-readable label for the enum case
- Must be implemented by each enum
- Used for display purposes

```php
echo Status::ACTIVE->label(); // "Active"
```

#### Static Methods

**`fromString(?string $value): ?static`**
- Converts string to enum (case-insensitive)
- Trims whitespace
- Returns `null` if invalid
- Provided by trait

```php
$status = Status::fromString('ACTIVE');  // Status::ACTIVE
$status = Status::fromString('active');  // Status::ACTIVE (case-insensitive)
$status = Status::fromString('invalid'); // null
```

**`isValid(?string $value): bool`**
- Validates if string is a valid enum value
- Case-insensitive
- Returns `false` for `null`
- Provided by trait

```php
Status::isValid('active');   // true
Status::isValid('ACTIVE');   // true (case-insensitive)
Status::isValid('invalid');  // false
Status::isValid(null);       // false
```

**`values(): array<int, string>`**
- Returns all enum values as array
- Bonus method provided by trait

```php
Status::values(); // ['active', 'inactive', 'pending']
```

**`labels(): array<string, string>`**
- Returns value => label map
- Useful for building forms
- Bonus method provided by trait

```php
Status::labels();
// ['active' => 'Active', 'inactive' => 'Inactive', 'pending' => 'Pending']
```

**`cases(): array<int, static>`**
- Native PHP enum method
- Returns all enum cases

```php
foreach (Status::cases() as $case) {
    echo "{$case->name}: {$case->value} - {$case->label()}\n";
}
```

## Common Patterns

### API Data Processing

```php
// Validate before conversion
if (Status::isValid($apiData['status'] ?? null)) {
    $status = Status::fromString($apiData['status']);
    // Process with type-safe enum
}
```

### Form Generation

```php
// Generate select options
foreach (Status::cases() as $case) {
    echo "<option value=\"{$case->value}\">{$case->label()}</option>";
}

// Or using labels()
foreach (Status::labels() as $value => $label) {
    echo "<option value=\"$value\">$label</option>";
}
```

### Database Queries

```php
// Get all valid values for WHERE IN clause
$validStatuses = Status::values();
// ['active', 'inactive', 'pending']

$query = "SELECT * FROM orders WHERE status IN (?, ?, ?)";
```

### Validation Rules

```php
// Build validation rule
$validationRule = 'in:' . implode(',', Status::values());
// "in:active,inactive,pending"
```

## Extending Functionality

The trait can be extended with additional methods. Each enum inherits them automatically:

```php
trait StringBackedEnumTrait
{
    // ... existing methods ...

    /**
     * Get enum description (optional)
     */
    public function description(): ?string
    {
        // Enums can optionally implement this
        return null;
    }
}
```

## Migration Guide

### Before (Inconsistent)

```php
enum Salutation: string
{
    case MRS = 'F';
    case MR = 'M';

    // Custom implementation per enum
    public function label(): string { /* ... */ }
    public static function fromString(?string $value): ?self { /* ... */ }
    public static function isValid(?string $value): bool { /* ... */ }
}
```

### After (Standardized)

```php
enum Salutation: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case MRS = 'F';
    case MR = 'M';

    // Only label() needs implementation
    public function label(): string
    {
        return match ($this) {
            self::MRS => 'Mrs',
            self::MR => 'Mr',
        };
    }
}
```

## Benefits

1. **Consistency**: All enums follow the same pattern
2. **Type Safety**: Interface enforces implementation
3. **Less Code**: Trait reduces duplication (~40 lines per enum)
4. **Easy Testing**: Trait tested once, applies to all enums
5. **Extensible**: Add new methods in trait, all enums inherit
6. **PHPStan Compliant**: Full static analysis support
7. **Self-Documenting**: Clear contract via interface

## Testing

The trait is comprehensively tested in `tests/Unit/Trait/StringBackedEnumTraitTest.php`:
- Case-insensitive conversion
- Whitespace handling
- Validation logic
- Helper methods (`values()`, `labels()`)
- Edge cases (null, empty, invalid)

## Examples

See `examples/enum-interface-trait.php` for complete usage examples including:
- Basic usage
- API integration
- Form generation
- Validation patterns
- Iteration patterns

## Performance

The trait methods are lightweight:
- `fromString()`: O(n) where n = number of enum cases
- `isValid()`: O(n) via `fromString()`
- `values()`: O(n) with array_map
- `labels()`: O(n) with single foreach

For enums with many cases (>20), consider caching if called frequently.

## Alternatives Considered

### 1. Abstract Base Class
❌ PHP enums cannot extend classes

### 2. Standalone Utility Class
❌ Loses type-safety, requires passing enum class name

### 3. Repeating Code Per Enum
❌ Violates DRY, hard to maintain, error-prone

### 4. PHP 8.4 Features
❌ No built-in enum utilities for string conversion/validation

**Conclusion**: Interface + Trait is the best approach for PHP enums.
