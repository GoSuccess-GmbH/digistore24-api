# Migration Guide

## From `gosuccess/php-ds24-api-wrapper` to `gosuccess/digistore24-api`

This package has been renamed and refactored with breaking changes.

### Package Name Change

**Old:** `gosuccess/php-ds24-api-wrapper`  
**New:** `gosuccess/digistore24-api`

### Installation

```bash
# Remove old package
composer remove gosuccess/php-ds24-api-wrapper

# Install new package
composer require gosuccess/digistore24-api
```

### Breaking Changes

#### 1. Namespace Change

**Old namespace:** `GoSuccess\Digistore24\`  
**New namespace:** `GoSuccess\Digistore24\Api\`

**Before:**
```php
use GoSuccess\Digistore24\Digistore24;
use GoSuccess\Digistore24\Client\Configuration;
use GoSuccess\Digistore24\Request\BuyUrl\CreateBuyUrlRequest;
```

**After:**
```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
```

#### 2. Constructor Changes

The `Digistore24` class now requires a `Configuration` object instead of individual parameters.

**Before:**
```php
$ds24 = new Digistore24(
    apiKey: 'YOUR-API-KEY',
    language: 'en',
    timeout: 30,
    debug: false
);
```

**After:**
```php
$config = new Configuration(
    apiKey: 'YOUR-API-KEY',
    language: 'en',
    timeout: 30,
    debug: false
);

$ds24 = new Digistore24($config);
```

#### 3. Client Access

The `getClient()` method has been removed. Use the public `$client` property instead.

**Before:**
```php
$client = $ds24->getClient();
```

**After:**
```php
$client = $ds24->client;
```

#### 4. Utils Directory Renamed

**Old:** `GoSuccess\Digistore24\Utils\`  
**New:** `GoSuccess\Digistore24\Api\Util\`

Note: `Utils` (plural) → `Util` (singular)

#### 5. Exception Namespace

**Old:** `GoSuccess\Digistore24\Exception\`  
**New:** `GoSuccess\Digistore24\Api\Exception\`

### What's New

- **PHP 8.4 Property Hooks** - Automatic validation on property assignment
- **Lazy Loading** - Resources are initialized on-demand
- **Configuration Object** - Centralized configuration with validation
- **Computed Properties** - Properties like `$apiUrl` are automatically computed
- **Type Safety** - Enhanced type hints throughout the codebase

### Example Migration

**Complete Before:**
```php
<?php

use GoSuccess\Digistore24\Digistore24;
use GoSuccess\Digistore24\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\DataTransferObject\BuyerData;

$ds24 = new Digistore24(
    apiKey: 'YOUR-API-KEY',
    language: 'en'
);

$request = new CreateBuyUrlRequest();
$request->productId = 12345;
$response = $ds24->buyUrls->create($request);
```

**Complete After:**
```php
<?php

use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;
use GoSuccess\Digistore24\Api\Request\BuyUrl\CreateBuyUrlRequest;
use GoSuccess\Digistore24\Api\DataTransferObject\BuyerData;

$config = new Configuration(
    apiKey: 'YOUR-API-KEY',
    language: 'en'
);

$ds24 = new Digistore24($config);

$request = new CreateBuyUrlRequest();
$request->productId = 12345;
$response = $ds24->buyUrls->create($request);
```

### Find & Replace Guide

Use your IDE's find & replace feature:

1. **Namespace imports:**
   - Find: `use GoSuccess\Digistore24\`
   - Replace: `use GoSuccess\Digistore24\Api\`

2. **Exception catches:**
   - Find: `\GoSuccess\Digistore24\Exception\`
   - Replace: `\GoSuccess\Digistore24\Api\Exception\`

3. **Utils references:**
   - Find: `GoSuccess\Digistore24\Utils\`
   - Replace: `GoSuccess\Digistore24\Api\Util\`

### Need Help?

If you encounter any issues during migration:

1. Check the [README.md](README.md) for updated examples
2. Review the [examples/](examples/) directory for complete usage examples
3. Open an issue on [GitHub](https://github.com/GoSuccess-GmbH/digistore24-api/issues)

### Why the Change?

- **Better Namespace Structure** - Aligns with our existing `digistore24-ipn` package
- **Clearer Package Name** - Reflects that this is an API client, not just a wrapper
- **Modern Architecture** - Leverages PHP 8.4 features for better developer experience
- **Consistency** - Part of the `GoSuccess\Digistore24\*` package family
