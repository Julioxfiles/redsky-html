<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use RedSky\Html\Documentation\ExampleLoader;


$loader = new ExampleLoader();


$examples = $loader->load(
    __DIR__ . '/../resources/views/components/interactive/button/examples'
);


foreach ($examples as $example) {

    echo "TITLE: ";
    echo $example->title();
    echo PHP_EOL;

    echo "FILE: ";
    echo $example->filename();
    echo PHP_EOL;

    echo "SOURCE:";
    echo PHP_EOL;

    echo $example->source();

    echo PHP_EOL;
    echo "OUTPUT:";
    echo PHP_EOL;

    echo $example->output();

    echo PHP_EOL;
    echo "-------------------------";
    echo PHP_EOL;
}