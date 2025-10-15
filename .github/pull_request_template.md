# Pull Request

## Description
<!-- Provide a clear and concise description of your changes -->

## Type of Change
<!-- Mark the relevant option with an "x" -->

- [ ] Bug fix (non-breaking change which fixes an issue)
- [ ] New feature (non-breaking change which adds functionality)
- [ ] Breaking change (fix or feature that would cause existing functionality to not work as expected)
- [ ] Documentation update
- [ ] Code refactoring
- [ ] Performance improvement
- [ ] Test improvement

## Related Issues
<!-- Link related issues here using #issue_number -->
Closes #
Relates to #

## Changes Made
<!-- List the main changes made in this PR -->

- 
- 
- 

## Breaking Changes
<!-- If this introduces breaking changes, describe them here and update CHANGELOG.md -->

- [ ] No breaking changes
- [ ] Breaking changes (describe below):

## Testing
<!-- Describe how you tested your changes -->

### Test Coverage
- [ ] Unit tests added/updated
- [ ] Integration tests added/updated
- [ ] All tests pass locally (`composer test`)
- [ ] Code coverage maintained or improved

### Manual Testing
<!-- Describe manual testing performed -->

```php
// Example code demonstrating the change
```

## Code Quality
<!-- Confirm code quality checks -->

- [ ] Code follows project style guidelines (see CONTRIBUTING.md)
- [ ] PHPStan analysis passes (`composer analyse`)
- [ ] PHP CS Fixer passes (`composer cs:check`)
- [ ] Self-review performed
- [ ] Comments added for complex logic
- [ ] No unnecessary code duplication

## Documentation
<!-- Confirm documentation updates -->

- [ ] PHPDoc comments added/updated
- [ ] README.md updated (if needed)
- [ ] CHANGELOG.md updated
- [ ] Endpoint documentation added/updated (if applicable)
- [ ] Examples updated (if applicable)

## Architecture
<!-- Confirm adherence to project architecture -->

- [ ] Single class per file
- [ ] Uses imports instead of FQCNs
- [ ] Property hooks used where applicable (PHP 8.4)
- [ ] DTOs used for structured data
- [ ] Follows naming conventions (see CONTRIBUTING.md)

## Checklist
<!-- Final checklist before submitting -->

- [ ] My code follows the style guidelines of this project
- [ ] I have performed a self-review of my own code
- [ ] I have commented my code, particularly in hard-to-understand areas
- [ ] I have made corresponding changes to the documentation
- [ ] My changes generate no new warnings
- [ ] I have added tests that prove my fix is effective or that my feature works
- [ ] New and existing unit tests pass locally with my changes
- [ ] Any dependent changes have been merged and published

## Screenshots / Examples
<!-- If applicable, add screenshots or code examples -->

```php
// Before
$oldWay = ...;

// After
$newWay = ...;
```

## Additional Notes
<!-- Any additional information that reviewers should know -->

---

## Reviewer Guidelines
<!-- For reviewers -->

**Review Focus Areas:**
- [ ] Code quality and adherence to standards
- [ ] Test coverage and quality
- [ ] Documentation completeness
- [ ] Backwards compatibility
- [ ] Performance implications
- [ ] Security considerations
