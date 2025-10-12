<?php

require 'vendor/autoload.php';

use GoSuccess\Digistore24\Util\TypeConverter;

$json = '{"key":"value","number":42}';
$result = TypeConverter::toArray($json);

echo "Input: " . $json . PHP_EOL;
echo "Result: ";
var_dump($result);
echo "JSON last error: " . json_last_error_msg() . PHP_EOL;
