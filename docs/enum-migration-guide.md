# Enum Migration to StringBackedEnum Interface

## Overview

This document provides a step-by-step guide to migrate all string-backed enums to use the `StringBackedEnum` interface and `StringBackedEnumTrait`.

## Current Status

- ✅ **Salutation.php** - Already migrated (has label(), fromString(), isValid())
- ⏳ **15 other enums** - Need migration

## Migration Strategy

### Phase 1: Simple Enums (No Custom Logic)

These enums just need interface + trait + label() method:

1. **HttpMethod.php** - GET, POST, PUT, DELETE, PATCH
2. **ApiPermission.php** - READ_ONLY, WRITABLE
3. **BillingPaymentStatus.php** - COMPLETED, PENDING, UNCERTAIN, REFUSED, ERROR
4. **BillingRebillingStatus.php** - PAYING, ABORTED, UNPAID, COMPLETED
5. **BillingRebillingCode.php** - STOPPED_NOW, STOPPED_LATER, STOPPED_MANUAL_REBILLING
6. **ApiRequestStatus.php** - PENDING, ABORTED, COMPLETED
7. **AffiliateApprovalStatus.php** - NEW, APPROVED, REJECTED, PENDING
8. **IpnTiming.php** - BEFORE_THANKYOU, DELAYED
9. **GlobalReseller.php** - DE, US, UK, IE

### Phase 2: Medium Complexity Enums

These enums might benefit from more descriptive labels:

10. **GlobalPayMethod.php** - TEST, PAYPAL, SEZZLE, CREDITCARD, ELV, BANKTRANSFER, KLARNA
11. **GlobalGrantedRole.php** - USER, AFFILIATE, VENDOR, OPERATOR, ADMIN, MERCHANT
12. **IpnTransactionCategory.php** - ORDERS, AFFILIATIONS, ETICKETS, CUSTOMFORMS, ORDERFORM

### Phase 3: Complex Enums

These enums have many cases and need careful label mapping:

13. **IpnTransactionType.php** - ALL, PAYMENT, REFUND, CHARGEBACK, PAYMENT_MISSED, etc. (9 cases)
14. **IpnNewsletterSendPolicy.php** - SEND_IF_NOT_OPTOUT, SEND_ALWAYS, etc. (4 cases)
15. **HttpStatusCode.php** - OK, CREATED, BAD_REQUEST, etc. (many cases)

## Migration Template

### Before

```php
enum ApiPermission: string
{
    case READ_ONLY = 'read-only';
    case WRITABLE = 'writable';
}
```

### After

```php
use GoSuccess\Digistore24\Api\Contract\StringBackedEnum;
use GoSuccess\Digistore24\Api\Trait\StringBackedEnumTrait;

enum ApiPermission: string implements StringBackedEnum
{
    use StringBackedEnumTrait;

    case READ_ONLY = 'read-only';
    case WRITABLE = 'writable';

    public function label(): string
    {
        return match ($this) {
            self::READ_ONLY => 'Read Only',
            self::WRITABLE => 'Writable',
        };
    }
}
```

## Label Recommendations

### Conversion Rules

1. **SCREAMING_SNAKE_CASE → Title Case**
   - `READ_ONLY` → `'Read Only'`
   - `PAYMENT_MISSED` → `'Payment Missed'`
   - `STOPPED_MANUAL_REBILLING` → `'Stopped Manual Rebilling'`

2. **HTTP Methods/Codes → Keep Uppercase**
   - `GET` → `'GET'`
   - `POST` → `'POST'`
   - `NOT_FOUND` → `'Not Found'` (or `'404 Not Found'`)

3. **Technical Terms → Proper Capitalization**
   - `PAYPAL` → `'PayPal'`
   - `CREDITCARD` → `'Credit Card'`
   - `BANKTRANSFER` → `'Bank Transfer'`

4. **Short Codes → Full Names**
   - `ELV` → `'ELV (Direct Debit)'` or just `'ELV'`
   - `DE` → `'Germany'` or `'DE'`

## Example Migrations

### Example 1: ApiPermission

```php
public function label(): string
{
    return match ($this) {
        self::READ_ONLY => 'Read Only',
        self::WRITABLE => 'Writable',
    };
}
```

### Example 2: GlobalPayMethod

```php
public function label(): string
{
    return match ($this) {
        self::TEST => 'Test',
        self::PAYPAL => 'PayPal',
        self::SEZZLE => 'Sezzle',
        self::CREDITCARD => 'Credit Card',
        self::ELV => 'ELV',
        self::BANKTRANSFER => 'Bank Transfer',
        self::KLARNA => 'Klarna',
    };
}
```

### Example 3: IpnTransactionType

```php
public function label(): string
{
    return match ($this) {
        self::ALL => 'All',
        self::PAYMENT => 'Payment',
        self::REFUND => 'Refund',
        self::CHARGEBACK => 'Chargeback',
        self::PAYMENT_MISSED => 'Payment Missed',
        self::PAYMENT_DENIAL => 'Payment Denial',
        self::REBILL_CANCELLED => 'Rebill Cancelled',
        self::REBILL_RESUMED => 'Rebill Resumed',
        self::LAST_PAID_DAY => 'Last Paid Day',
    };
}
```

### Example 4: HttpStatusCode (many cases)

```php
public function label(): string
{
    return match ($this) {
        self::OK => 'OK',
        self::CREATED => 'Created',
        self::ACCEPTED => 'Accepted',
        self::NO_CONTENT => 'No Content',
        self::MOVED_PERMANENTLY => 'Moved Permanently',
        self::FOUND => 'Found',
        self::BAD_REQUEST => 'Bad Request',
        self::UNAUTHORIZED => 'Unauthorized',
        self::FORBIDDEN => 'Forbidden',
        self::NOT_FOUND => 'Not Found',
        self::METHOD_NOT_ALLOWED => 'Method Not Allowed',
        self::CONFLICT => 'Conflict',
        self::UNPROCESSABLE_ENTITY => 'Unprocessable Entity',
        self::TOO_MANY_REQUESTS => 'Too Many Requests',
        self::INTERNAL_SERVER_ERROR => 'Internal Server Error',
        self::BAD_GATEWAY => 'Bad Gateway',
        self::SERVICE_UNAVAILABLE => 'Service Unavailable',
        self::GATEWAY_TIMEOUT => 'Gateway Timeout',
    };
}
```

## Automated Migration Script

```php
<?php
// scripts/migrate-enums.php
// Run with: php scripts/migrate-enums.php

// Helper function to convert SCREAMING_SNAKE_CASE to Title Case
function snakeToTitle(string $name): string
{
    return str_replace('_', ' ', ucwords(strtolower($name), '_'));
}

// Generate label() method for an enum file
function generateLabelMethod(string $enumFile): string
{
    // Parse enum cases from file
    preg_match_all('/case\s+(\w+)\s*=/', file_get_contents($enumFile), $matches);
    $cases = $matches[1];
    
    $labels = array_map(fn($case) => "            self::$case => '" . snakeToTitle($case) . "',", $cases);
    
    return "    public function label(): string\n" .
           "    {\n" .
           "        return match (\$this) {\n" .
           implode("\n", $labels) . "\n" .
           "        };\n" .
           "    }";
}
```

## Testing Strategy

After each migration:

1. ✅ **PHPStan validation**
   ```bash
   php vendor/bin/phpstan analyse src/Enum/YourEnum.php --level=9
   ```

2. ✅ **Manual testing**
   ```php
   php -r "require 'vendor/autoload.php'; 
   use YourNamespace\YourEnum;
   var_dump(YourEnum::cases());
   var_dump(YourEnum::fromString('value'));
   var_dump(YourEnum::isValid('value'));
   var_dump(YourEnum::YOUR_CASE->label());"
   ```

3. ✅ **Update tests** if enum is tested

## Rollout Plan

### Week 1: Phase 1 (9 simple enums)
- Migrate all simple enums
- Update any affected tests
- Commit: `refactor(enum): Migrate simple enums to StringBackedEnum interface`

### Week 2: Phase 2 (3 medium enums)
- Migrate medium complexity enums
- Carefully craft meaningful labels
- Commit: `refactor(enum): Migrate medium complexity enums to StringBackedEnum`

### Week 3: Phase 3 (3 complex enums)
- Migrate complex enums with many cases
- Thoroughly test all cases
- Commit: `refactor(enum): Migrate complex enums to StringBackedEnum`

### Week 4: Cleanup & Documentation
- Update all enum documentation
- Update examples
- Commit: `docs(enum): Update enum documentation after migration`

## Benefits After Migration

1. ✅ All enums have consistent `label()` method for display
2. ✅ All enums support `fromString()` for case-insensitive conversion
3. ✅ All enums support `isValid()` for validation
4. ✅ All enums have `values()` and `labels()` helper methods
5. ✅ Reduced code duplication (saves ~30 lines per enum)
6. ✅ Better type-safety via interface contract
7. ✅ Easier to maintain and extend

## Notes

- **HttpMethod** might not need labels (GET is already clear)
- **HttpStatusCode** labels could include status codes: `'404 Not Found'`
- **GlobalReseller** could use full country names: `'Germany'`, `'United States'`, etc.
- Some enums might benefit from additional methods (add to trait or individual enum)

## Questions to Consider

1. Should `HttpMethod` and `HttpStatusCode` use the value as label? (e.g., `'GET'` → `'GET'`)
2. Should `GlobalReseller` use country names or codes? (`'DE'` vs `'Germany'`)
3. Should labels be translatable? (Consider i18n strategy)
4. Should some enums have descriptions in addition to labels?

## Conclusion

This migration will standardize all enums in the codebase, making them more consistent, maintainable, and user-friendly. The interface + trait pattern ensures type-safety while reducing code duplication.
