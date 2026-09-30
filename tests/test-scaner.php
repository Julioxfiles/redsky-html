<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use RedSky\Html\Documentation\ComponentScanner;

$scanner = new ComponentScanner();

$scanner->scan();

echo '<pre>';

print_r($scanner->errors());

echo '</pre>';