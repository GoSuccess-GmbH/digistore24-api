<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Tests\Integration;

use PHPUnit\Framework\TestCase;

/**
 * Base class for integration tests with configuration management
 *
 * Automatically loads test configuration from .env.local or environment variables
 * and skips tests when required configuration is missing.
 */
abstract class IntegrationTestCase extends TestCase
{
    protected static bool $configLoaded = false;

    /** @var array<string> */
    protected static array $missingConfigs = [];

    /**
     * Load configuration before running tests
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        if (! self::$configLoaded) {
            self::loadConfiguration();
            self::$configLoaded = true;
        }
    }

    /**
     * Load configuration from .env.local or environment
     */
    protected static function loadConfiguration(): void
    {
        $envFile = __DIR__ . '/../../.env.local';

        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if ($lines === false) {
                return;
            }

            foreach ($lines as $line) {
                // Skip comments and empty lines
                if (str_starts_with(trim($line), '#') || empty(trim($line))) {
                    continue;
                }

                // Parse KEY=VALUE
                if (str_contains($line, '=')) {
                    [$key, $value] = explode('=', $line, 2);
                    $key = trim($key);
                    $value = trim($value);

                    // Only set if not already in environment
                    if (! isset($_ENV[$key]) && ! getenv($key)) {
                        putenv("{$key}={$value}");
                        $_ENV[$key] = $value;
                    }
                }
            }
        }
    }

    /**
     * Get configuration value with optional default
     *
     * @param string $key Configuration key (e.g., 'DS24_TEST_PRODUCT_ID')
     * @param string|null $default Default value if not set
     * @return string|null Configuration value or default
     */
    protected function getConfig(string $key, ?string $default = null): ?string
    {
        $envValue = $_ENV[$key] ?? null;
        if (is_string($envValue) && $envValue !== '') {
            return $envValue;
        }

        $getenvValue = getenv($key);
        if (is_string($getenvValue) && $getenvValue !== '') {
            return $getenvValue;
        }

        return $default;
    }

    /**
     * Get required configuration value or skip test if missing
     *
     * @param string $key Configuration key
     * @param string|null $reason Optional reason for skipping
     * @return string Configuration value
     */
    protected function requireConfig(string $key, ?string $reason = null): string
    {
        $value = $this->getConfig($key);

        if ($value === null || $value === '') {
            $reason ??= "Required configuration '{$key}' is not set";

            // Track missing config
            if (! in_array($key, self::$missingConfigs, true)) {
                self::$missingConfigs[] = $key;
            }

            $this->markTestSkipped(
                "⚠️  {$reason}\n" .
                "   Please set '{$key}' in .env.local or environment variables.\n" .
                '   See .env.example for all available configuration options.',
            );
        }

        return $value;
    }

    /**
     * Check if API key is configured
     */
    protected function hasApiKey(): bool
    {
        return $this->getConfig('DS24_API_KEY') !== null;
    }

    /**
     * Get API key or skip test
     */
    protected function getApiKey(): string
    {
        return $this->requireConfig(
            'DS24_API_KEY',
            'Digistore24 API key is required for integration tests',
        );
    }

    /**
     * Skip test if running in CI without explicit flag
     */
    protected function skipInCiWithoutFlag(): void
    {
        $isCI = getenv('CI') === 'true' || getenv('GITHUB_ACTIONS') === 'true';
        $allowCI = getenv('DS24_ALLOW_CI_TESTS') === 'true';

        if ($isCI && ! $allowCI) {
            $this->markTestSkipped(
                'Integration tests are disabled in CI by default. ' .
                'Set DS24_ALLOW_CI_TESTS=true to enable.',
            );
        }
    }

    /**
     * Get all missing configurations
     *
     * @return array<string>
     */
    public static function getMissingConfigurations(): array
    {
        return self::$missingConfigs;
    }

    /**
     * Display summary of missing configurations after all tests
     */
    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();

        if (! empty(self::$missingConfigs) && ! getenv('DS24_SUPPRESS_WARNINGS')) {
            fwrite(
                STDERR,
                "\n" . str_repeat('=', 80) . "\n" .
                "⚠️  INTEGRATION TEST CONFIGURATION SUMMARY\n" .
                str_repeat('=', 80) . "\n" .
                "Some tests were skipped due to missing configuration:\n\n",
            );

            foreach (self::$missingConfigs as $key) {
                fwrite(STDERR, "   - {$key}\n");
            }

            fwrite(
                STDERR,
                "\nTo run all integration tests:\n" .
                "1. Copy .env.example to .env.local\n" .
                "2. Fill in your test data (use SANDBOX/TEST data only!)\n" .
                "3. Run: composer test:integration\n" .
                "\nSee .env.example for all available configuration options.\n" .
                str_repeat('=', 80) . "\n\n",
            );
        }
    }
}
