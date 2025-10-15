<?php

declare(strict_types=1);

/**
 * OpenAPI DTO Analyzer
 * 
 * This script analyzes the openapi.yaml file to identify all Data Transfer Objects
 * that should be created based on request body schemas and response schemas.
 * 
 * Usage: php scripts/analyze-dtos.php
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

const OPENAPI_FILE = __DIR__ . '/../openapi.yaml';
const OUTPUT_DIR = __DIR__ . '/../src/DataTransferObject';

// Color codes for output
const COLOR_GREEN = "\033[32m";
const COLOR_YELLOW = "\033[33m";
const COLOR_BLUE = "\033[34m";
const COLOR_CYAN = "\033[36m";
const COLOR_RED = "\033[31m";
const COLOR_RESET = "\033[0m";

function output(string $message, string $color = COLOR_RESET): void
{
    echo $color . $message . COLOR_RESET . PHP_EOL;
}

// Load OpenAPI specification
output('📖 Loading OpenAPI specification...', COLOR_CYAN);
$spec = Yaml::parseFile(OPENAPI_FILE);

$dtoAnalysis = [
    'request_bodies' => [],
    'complex_properties' => [],
    'existing_dtos' => [],
    'recommended_dtos' => []
];

// Find existing DTOs
output('🔍 Scanning existing DTOs...', COLOR_CYAN);
$existingDtoFiles = glob(OUTPUT_DIR . '/*.php');
foreach ($existingDtoFiles as $file) {
    $dtoAnalysis['existing_dtos'][] = basename($file, '.php');
}
output('   Found ' . count($dtoAnalysis['existing_dtos']) . ' existing DTOs: ' . implode(', ', $dtoAnalysis['existing_dtos']), COLOR_GREEN);

// Analyze all paths for request bodies
output("\n🔍 Analyzing API endpoints for request bodies...", COLOR_CYAN);
foreach ($spec['paths'] ?? [] as $path => $methods) {
    foreach ($methods as $method => $operation) {
        if (!is_array($operation) || !isset($operation['requestBody'])) {
            continue;
        }

        $requestBody = $operation['requestBody'];
        $schema = $requestBody['content']['application/json']['schema'] ?? null;
        
        if (!$schema || !isset($schema['properties'])) {
            continue;
        }

        $operationId = $operation['operationId'] ?? $path;
        $summary = $operation['summary'] ?? '';
        
        // Analyze complex properties that might need DTOs
        foreach ($schema['properties'] as $propName => $propSchema) {
            // Check if this is a complex object that deserves its own DTO
            if (isset($propSchema['type']) && $propSchema['type'] === 'object' && isset($propSchema['properties'])) {
                $dtoName = ucfirst($propName) . 'Data';
                $dtoAnalysis['complex_properties'][$dtoName] = [
                    'property_name' => $propName,
                    'endpoint' => $operationId,
                    'path' => $path,
                    'schema' => $propSchema,
                    'used_in' => [$operationId]
                ];
            }
        }

        // Store the full request body schema
        $dtoAnalysis['request_bodies'][$operationId] = [
            'path' => $path,
            'method' => strtoupper($method),
            'summary' => $summary,
            'schema' => $schema,
            'property_count' => count($schema['properties'] ?? [])
        ];
    }
}

output('   Found ' . count($dtoAnalysis['request_bodies']) . ' endpoints with request bodies', COLOR_GREEN);
output('   Found ' . count($dtoAnalysis['complex_properties']) . ' complex nested objects', COLOR_GREEN);

// Analyze which DTOs should be created
output("\n🎯 Recommending DTOs to create...", COLOR_CYAN);

$priorities = [
    'HIGH' => [],
    'MEDIUM' => [],
    'LOW' => []
];

// Priority 1: Complex nested objects (urls, settings, placeholders, etc.)
foreach ($dtoAnalysis['complex_properties'] as $dtoName => $info) {
    if (!in_array($dtoName, $dtoAnalysis['existing_dtos'])) {
        $propCount = count($info['schema']['properties'] ?? []);
        if ($propCount >= 5) {
            $priorities['HIGH'][$dtoName] = $info;
        } elseif ($propCount >= 3) {
            $priorities['MEDIUM'][$dtoName] = $info;
        } else {
            $priorities['LOW'][$dtoName] = $info;
        }
    }
}

// Priority 2: Commonly used data structures
$commonPatterns = [
    'urls' => 'UrlsData',
    'settings' => 'SettingsData',
    'placeholder' => 'PlaceholderData',
    'tracking' => 'TrackingData',
    'buyer' => 'BuyerData',
    'product' => 'ProductData',
    'payment' => 'PaymentData',
    'shipping' => 'ShippingData',
    'orderform' => 'OrderFormData',
];

foreach ($dtoAnalysis['request_bodies'] as $operationId => $info) {
    foreach ($info['schema']['properties'] ?? [] as $propName => $propSchema) {
        foreach ($commonPatterns as $pattern => $suggestedDto) {
            if (stripos($propName, $pattern) !== false && !in_array($suggestedDto, $dtoAnalysis['existing_dtos'])) {
                if (!isset($priorities['HIGH'][$suggestedDto])) {
                    $priorities['MEDIUM'][$suggestedDto] = [
                        'property_name' => $propName,
                        'endpoint' => $operationId,
                        'schema' => $propSchema,
                        'pattern_match' => $pattern
                    ];
                }
            }
        }
    }
}

// Output recommendations
output("\n" . COLOR_RED . "🔴 HIGH PRIORITY" . COLOR_RESET . " (5+ properties, complex structures):");
foreach ($priorities['HIGH'] as $dtoName => $info) {
    $propCount = count($info['schema']['properties'] ?? []);
    output("   - $dtoName ($propCount properties) - used in: {$info['endpoint']}", COLOR_YELLOW);
}

output("\n" . COLOR_YELLOW . "🟡 MEDIUM PRIORITY" . COLOR_RESET . " (3-4 properties, common patterns):");
foreach ($priorities['MEDIUM'] as $dtoName => $info) {
    $propCount = count($info['schema']['properties'] ?? []);
    $context = $info['pattern_match'] ?? $info['endpoint'];
    output("   - $dtoName ($propCount properties) - $context", COLOR_BLUE);
}

output("\n" . COLOR_BLUE . "🔵 LOW PRIORITY" . COLOR_RESET . " (1-2 properties, simple structures):");
foreach ($priorities['LOW'] as $dtoName => $info) {
    $propCount = count($info['schema']['properties'] ?? []);
    output("   - $dtoName ($propCount properties) - {$info['endpoint']}", COLOR_CYAN);
}

// Summary
$totalNeeded = count($priorities['HIGH']) + count($priorities['MEDIUM']) + count($priorities['LOW']);
output("\n📊 Summary:", COLOR_CYAN);
output("   Existing DTOs: " . count($dtoAnalysis['existing_dtos']), COLOR_GREEN);
output("   Recommended new DTOs: $totalNeeded", COLOR_YELLOW);
output("   Total after implementation: " . (count($dtoAnalysis['existing_dtos']) + $totalNeeded), COLOR_GREEN);

// Save analysis to JSON for further processing
$analysisFile = __DIR__ . '/dto-analysis.json';
file_put_contents($analysisFile, json_encode($dtoAnalysis, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
output("\n💾 Full analysis saved to: $analysisFile", COLOR_GREEN);

output("\n✅ Analysis complete!", COLOR_GREEN);
output("\n💡 Next step: php scripts/generate-dtos.php", COLOR_CYAN);
