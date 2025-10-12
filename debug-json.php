<?php

require 'vendor/autoload.php';

use GoSuccess\Digistore24\Util\TypeConverter;

// Test direkt im PHPUnit-Kontext
$json = '{"key":"value","number":42}';

echo "Before decode:\n";
echo "  json_last_error(): " . json_last_error() . "\n";
echo "  json_last_error_msg(): " . json_last_error_msg() . "\n\n";

$decoded = json_decode($json, true);

echo "After decode:\n";
echo "  Result: ";
var_dump($decoded);
echo "  json_last_error(): " . json_last_error() . "\n";
echo "  json_last_error_msg(): " . json_last_error_msg() . "\n";
echo "  is_array(decoded): " . (is_array($decoded) ? 'true' : 'false') . "\n\n";

// Now test TypeConverter
echo "TypeConverter::toArray() result:\n";
$result = TypeConverter::toArray($json);
var_dump($result);
