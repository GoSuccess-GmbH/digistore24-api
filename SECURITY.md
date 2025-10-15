# Security Policy

## Supported Versions

We release patches for security vulnerabilities. Which versions are eligible for receiving such patches depends on the CVSS v3.0 Rating:

| Version | Supported          |
| ------- | ------------------ |
| 2.x     | :white_check_mark: |
| 1.4.x   | :white_check_mark: |
| < 1.4   | :x:                |

## Reporting a Vulnerability

**Please do not report security vulnerabilities through public GitHub issues.**

Instead, please report them via email to:

- **Email**: security@gosuccess.io

You should receive a response within 48 hours. If for some reason you do not, please follow up via email to ensure we received your original message.

Please include the following information in your report:

- Type of vulnerability (e.g., XSS, SQL injection, authentication bypass)
- Full paths of source file(s) related to the manifestation of the vulnerability
- The location of the affected source code (tag/branch/commit or direct URL)
- Any special configuration required to reproduce the issue
- Step-by-step instructions to reproduce the issue
- Proof-of-concept or exploit code (if possible)
- Impact of the vulnerability, including how an attacker might exploit it

This information will help us triage your report more quickly.

## Disclosure Policy

When we receive a security bug report, we will:

1. Confirm the problem and determine the affected versions
2. Audit code to find any similar problems
3. Prepare fixes for all supported versions
4. Release new security patch versions as soon as possible

## Security Best Practices

### API Key Management

**Never commit API keys to version control:**

```php
// ❌ BAD - Hard-coded API key
$config = new Configuration('12345-your-api-key');

// ✅ GOOD - Use environment variables
$config = new Configuration($_ENV['DIGISTORE24_API_KEY']);
```

**Use environment variables:**

```bash
# .env (add to .gitignore!)
DIGISTORE24_API_KEY=your-secret-api-key-here
```

```php
// Load from .env
$config = new Configuration(getenv('DIGISTORE24_API_KEY'));
```

### HTTPS Only

Always use HTTPS connections:

```php
// The library enforces HTTPS by default
// API URL: https://www.digistore24.com/api/call
```

### Input Validation

Validate all user inputs before passing to the API:

```php
use GoSuccess\Digistore24\Api\DataTransferObject\BuyerData;

$buyer = new BuyerData();

// ✅ Email validation happens automatically via property hooks
try {
    $buyer->email = $_POST['email']; // Validates email format
} catch (\InvalidArgumentException $e) {
    // Handle invalid email
}
```

### Error Handling

Never expose sensitive information in error messages:

```php
try {
    $response = $ds24->buyUrls->create($request);
} catch (AuthenticationException $e) {
    // ❌ BAD - Exposes API key in logs
    error_log("Auth failed: " . $e->getMessage());
    
    // ✅ GOOD - Generic message to user
    return "Authentication failed. Please contact support.";
}
```

### Rate Limiting

The library includes built-in rate limiting, but implement your own application-level limits:

```php
// Use cache to track API calls per user
$cache = new Cache();
$key = "api_calls_user_{$userId}";

if ($cache->get($key) > 100) {
    throw new \Exception('Rate limit exceeded');
}

$cache->increment($key);
$cache->expire($key, 3600); // 1 hour TTL
```

### Timeout Configuration

Set appropriate timeouts to prevent hanging requests:

```php
$config = new Configuration(
    apiKey: $_ENV['DIGISTORE24_API_KEY'],
    timeout: 30, // 30 seconds max
    debug: false // Never enable debug in production
);
```

### Debug Mode

**Never enable debug mode in production:**

```php
// ❌ BAD - Debug mode in production exposes sensitive data
$config = new Configuration(
    apiKey: $apiKey,
    debug: true
);

// ✅ GOOD - Debug mode only in development
$config = new Configuration(
    apiKey: $apiKey,
    debug: $_ENV['APP_ENV'] === 'development'
);
```

### Dependency Management

Keep dependencies up to date:

```bash
# Check for security vulnerabilities
composer audit

# Update to latest secure versions
composer update --with-all-dependencies
```

### Logging

Sanitize logs to prevent information disclosure:

```php
// ❌ BAD - Logs entire request with API key
error_log(json_encode($request));

// ✅ GOOD - Log only necessary information
error_log("API request failed: " . $request->getEndpoint());
```

## Comments on This Policy

If you have suggestions on how this process could be improved, please submit a pull request or open an issue.

## Attribution

This security policy is based on security best practices and is inspired by [security.txt](https://securitytxt.org/).
