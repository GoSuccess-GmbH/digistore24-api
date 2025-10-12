<?php

require 'vendor/autoload.php';

$r = new ReflectionClass('GoSuccess\Digistore24\Util\TypeConverter');
echo "TypeConverter location: " . $r->getFileName() . PHP_EOL;

$method = $r->getMethod('toArray');
echo "toArray() method exists: " . ($method ? 'yes' : 'no') . PHP_EOL;
