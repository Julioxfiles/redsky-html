<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use RedSky\Html\Components\Interactive\Button;
use RedSky\Html\Documentation\Scanner;


/**
 * Test Scanner loading component documentation.
 */

$scanner = new Scanner();


$registry = $scanner->scan([
    Button::class
]);


$component = $registry->get(
    Button::class
);


echo "Component: " . $component->name() . PHP_EOL;
echo "Class: " . $component->class() . PHP_EOL;

echo PHP_EOL;

echo "Example files:" . PHP_EOL;


foreach ($component->exampleFiles() as $example) {

    echo "- " . $example->filename() . PHP_EOL;
    echo "  Title: " . $example->title() . PHP_EOL;
    echo "  Output: " . $example->output() . PHP_EOL;
    echo PHP_EOL;
}