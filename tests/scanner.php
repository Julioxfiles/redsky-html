<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use RedSky\Html\Components\Form\TextInput;
use RedSky\Html\Documentation\Scanner;

$scanner = new Scanner();

$registry = $scanner->scan([
    TextInput::class,
]);

$component = $registry->get(
    TextInput::class
);

if ($component === null) {
    echo "Component not found.";
    exit;
}

/*
 * Component
 */

echo "Component: {$component->name()}" . PHP_EOL;
echo "Class: {$component->class()}" . PHP_EOL;
echo "Category: {$component->category()}" . PHP_EOL;
echo "Description: {$component->description()}" . PHP_EOL;

/*
 * Methods
 */

echo PHP_EOL;
echo "Methods:" . PHP_EOL;

foreach ($component->methods() as $method) {
    echo "- {$method->name()}";

    if ($method->isInherited()) {
        echo " [inherited]";
    }

    echo " | Return: {$method->returnType()}";

    if ($method->isStatic()) {
        echo " | static";
    }

    if ($method->isFinal()) {
        echo " | final";
    }

    if ($method->isAbstract()) {
        echo " | abstract";
    }

    echo PHP_EOL;

    foreach ($method->parameters() as $parameter) {
        echo "    - {$parameter->name()}";
        echo " | Type: {$parameter->type()}";

        if ($parameter->isOptional()) {
            echo " | optional";
        }

        if ($parameter->isVariadic()) {
            echo " | variadic";
        }

        echo PHP_EOL;
    }
}

/*
 * Properties
 */

echo PHP_EOL;
echo "Properties:" . PHP_EOL;

foreach ($component->properties() as $property) {
    echo "- {$property->name()}";

    if ($property->isInherited()) {
        echo " [inherited]";
    }

    echo " | Type: {$property->type()}";
    echo " | Visibility: {$property->visibility()}";

    if ($property->isStatic()) {
        echo " | static";
    }

    if ($property->isReadOnly()) {
        echo " | readonly";
    }

    echo PHP_EOL;

    echo "    Description: {$property->description()}" . PHP_EOL;

    if ($property->default() !== null) {
        echo "    Default: ";

        var_export($property->default());

        echo PHP_EOL;
    }
}