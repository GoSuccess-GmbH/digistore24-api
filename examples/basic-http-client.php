<?php

/**
 * Example usage of the new HTTP Client Layer
 */

require_once __DIR__ . '/vendor/autoload.php';

use GoSuccess\Digistore24\Client\ApiClient;
use GoSuccess\Digistore24\Client\Configuration;
use GoSuccess\Digistore24\Http\Method;

// Create configuration
$config = new Configuration(
    apiKey: 'YOUR-API-KEY-HERE',
    language: 'en',
    debug: true
);

// Create API client
$client = new ApiClient($config);

// Example: Ping endpoint
try {
    $response = $client->request('ping', Method::GET);
    
    echo "API Version: " . $response->data['api_version'] . PHP_EOL;
    echo "Server Time: " . $response->data['data']['server_time'] . PHP_EOL;
    
} catch (\GoSuccess\Digistore24\Exceptions\ApiException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
    print_r($e->getContext());
}
