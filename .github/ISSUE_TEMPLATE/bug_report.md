---
name: Bug Report
about: Create a report to help us improve
title: '[BUG] '
labels: bug
assignees: ''
---

## Bug Description
A clear and concise description of what the bug is.

## Steps to Reproduce
Steps to reproduce the behavior:
1. Initialize client with '...'
2. Call method '....'
3. Pass parameters '....'
4. See error

## Expected Behavior
A clear and concise description of what you expected to happen.

## Actual Behavior
What actually happened.

## Code Example
```php
use GoSuccess\Digistore24\Api\Digistore24;
use GoSuccess\Digistore24\Api\Client\Configuration;

$config = new Configuration('API_KEY');
$ds24 = new Digistore24($config);

// Your code that reproduces the issue
```

## Error Message
```
Paste the full error message here
```

## Environment
- **PHP Version**: [e.g., 8.4.0]
- **Package Version**: [e.g., 2.0.0]
- **OS**: [e.g., Ubuntu 22.04, Windows 11]
- **Additional Extensions**: [e.g., curl 8.1.2]

## Additional Context
Add any other context about the problem here.

## Possible Solution
If you have ideas on how to fix this, please describe them here.

## Checklist
- [ ] I have searched existing issues to ensure this is not a duplicate
- [ ] I have included a code example that reproduces the issue
- [ ] I have included the full error message
- [ ] I have specified my environment details
