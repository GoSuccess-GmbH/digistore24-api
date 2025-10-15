# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Comprehensive contributing guidelines in CONTRIBUTING.md
- Complete API endpoints documentation (122 endpoints organized in 29 categories)
- MIGRATION.md with detailed upgrade instructions from v1.x
- 15 typed Data Transfer Objects (DTOs) with PHP 8.4 property hooks
- OpenAPI specification fetcher script for API documentation

### Changed
- Enforced single class per file standard (extracted helper classes)
- Replaced FQCNs with import statements throughout codebase
- Migrated 14 Request classes from array data to typed DTOs
- Consolidated documentation (merged ARCHITECTURE.md into README.md)
- Updated examples to use typed DTOs (UrlsData, SettingsData)

### Removed
- Legacy directories (src-legacy/, docs-legacy/) - preserved in git history
- Redundant documentation files (IMPLEMENTATION_ROADMAP.md, PHP84-REQUIRED.md)
- PHPUnit generated files from repository (added to .gitignore)

### Fixed
- PHPUnit 11 deprecation warnings (replaced @covers with CoversClass attribute)
- Endpoint path conventions (consistent leading slash usage)
- Nested data structure handling in Response fromArray methods
- AbstractResponse rawResponse property initialization

## [1.4.0] - 2024

### Added
- Complete endpoint documentation for all 122 API endpoints
- Comprehensive PHPDoc comments to all Resource files (36 files)
- PHPDoc documentation to all Request files (122 files)
- @param annotations for better IDE support

### Changed
- Improved documentation structure and consistency
- Updated roadmap to reflect 100% completion status

### Fixed
- Deprecated @covers annotations replaced with #[CoversClass] attributes
- Response tests with proper test data and rawResponse property access
- Nested object initialization in AccountAccess and Eticket responses

## [1.3.0] - 2024

### Added
- Additional endpoint implementations
- Enhanced test coverage

## [1.2.0] - 2024

### Added
- Extended API endpoint support
- Improved error handling

## [1.1.1] - 2024

### Fixed
- Minor bug fixes and improvements

## [1.1.0] - 2024

### Added
- `listCountries` endpoint implementation

### Changed
- Updated CountryController

### Removed
- Removed error_log statements

## [1.0.0] - 2024

### Added
- Initial release of Digistore24 API Client
- PHP 8.4 support with property hooks
- Resource-based architecture
- Type-safe requests and responses
- Automatic retry with exponential backoff
- Rate limiting support
- Comprehensive exception handling
- Basic endpoint implementations

### Project Information
- **Package Name**: gosuccess/digistore24-api
- **License**: MIT
- **PHP Version**: >=8.4.0
- **Repository**: https://github.com/GoSuccess-GmbH/digistore24-api

---

## Version History Summary

| Version | Release Date | Major Changes |
|---------|--------------|---------------|
| [Unreleased] | - | Documentation improvements, DTOs, code quality |
| [1.4.0] | 2024 | Complete documentation, PHPDoc coverage |
| [1.3.0] | 2024 | Additional endpoints |
| [1.2.0] | 2024 | Extended API support |
| [1.1.1] | 2024 | Bug fixes |
| [1.1.0] | 2024 | Country listing support |
| [1.0.0] | 2024 | Initial release |

## Migration Guides

- **v1.x to v2.x**: See [MIGRATION.md](MIGRATION.md) for detailed upgrade instructions
  - Namespace changes: `GoSuccess\Digistore24\` → `GoSuccess\Digistore24\Api\`
  - Constructor changes: Direct parameters → Configuration object
  - PHP 8.4 required for property hooks

## Links

- [GitHub Repository](https://github.com/GoSuccess-GmbH/digistore24-api)
- [Issue Tracker](https://github.com/GoSuccess-GmbH/digistore24-api/issues)
- [Contributing Guidelines](CONTRIBUTING.md)
