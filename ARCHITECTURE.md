# Project Structure

This project follows a clean, organized structure with **singular directory names** and **PHP 8.4 property hooks**.

## Directory Structure

```
src/
├── Base/                       # Abstract base classes
│   ├── AbstractRequest.php     # Base for all API requests
│   └── AbstractResponse.php    # Base for all API responses
│
├── Client/                     # HTTP client implementation
│   ├── ApiClient.php           # Main HTTP client with retry logic
│   └── Configuration.php       # API configuration with property hooks
│
├── Contract/                   # Interfaces (reserved for future use)
│
├── DataTransferObject/         # DTOs with property hooks
│   ├── BuyerData.php           # Buyer information (email validation)
│   ├── PaymentPlanData.php     # Payment plan (currency validation)
│   └── TrackingData.php        # Tracking parameters
│
├── Exception/                  # Exception hierarchy
│   ├── ApiException.php        # Base exception
│   ├── AuthenticationException.php
│   ├── ForbiddenException.php
│   ├── NotFoundException.php
│   ├── RateLimitException.php
│   ├── RequestException.php
│   └── ValidationException.php
│
├── Http/                       # HTTP-related classes
│   ├── CurlOption.php          # Typed cURL options
│   ├── CurlInfo.php            # Typed cURL info
│   ├── CurlHttpVersion.php     # HTTP version enum
│   ├── Method.php              # HTTP methods enum
│   ├── Response.php            # HTTP response wrapper
│   └── StatusCode.php          # HTTP status codes enum
│
├── Request/                    # Typed API requests
│   └── BuyUrl/
│       └── CreateBuyUrlRequest.php
│
├── Response/                   # Typed API responses
│   └── BuyUrl/
│       └── CreateBuyUrlResponse.php
│
└── Utils/                      # Utility classes
    ├── ArrayHelper.php         # Array operations
    ├── TypeConverter.php       # Type conversions
    └── Validator.php           # Validation utilities
```

## Naming Conventions

### Directories
- ✅ **Singular form**: `Exception/`, `Request/`, `Response/`
- ❌ NOT plural: ~~`Exceptions/`~~, ~~`Requests/`~~, ~~`Responses/`~~

### Classes
- **Abstract classes**: `AbstractRequest`, `AbstractResponse` → in `Base/`
- **Interfaces**: `RequestInterface`, `ResponseInterface` → in `Contract/`
- **DTOs**: `BuyerData`, `PaymentPlanData` → in `DataTransferObject/`
- **Exceptions**: `ApiException`, `NotFoundException` → in `Exception/`
- **Enums**: `Method`, `StatusCode` → in `Http/`

### Namespaces
```php
GoSuccess\Digistore24\Base\AbstractRequest
GoSuccess\Digistore24\Contract\RequestInterface
GoSuccess\Digistore24\DataTransferObject\BuyerData
GoSuccess\Digistore24\Exception\ApiException
GoSuccess\Digistore24\Request\BuyUrl\CreateBuyUrlRequest
```

## PHP 8.4 Features

### Property Hooks
```php
final class BuyerData
{
    public string $email {
        set {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                throw new \InvalidArgumentException("Invalid email");
            }
            $this->email = $value;
        }
    }
}
```

### Benefits
- ✅ No boilerplate constructors
- ✅ Automatic validation on assignment
- ✅ Mutable properties (read AND write)
- ✅ Clean, maintainable code

### Usage
```php
$buyer = new BuyerData();
$buyer->email = 'test@example.com';  // Validated automatically
$buyer->country = 'de';              // Auto-uppercased to 'DE'
```

## Architecture Decisions

1. **Singular directories** - More consistent with PSR standards
2. **Property hooks** - Eliminate constructors where possible
3. **final classes** - Not readonly (allow mutation)
4. **Typed constants** - Enums instead of magic values
5. **String interpolation** - `"{$var}"` instead of concatenation
