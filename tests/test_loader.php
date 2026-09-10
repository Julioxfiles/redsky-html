<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use RedSky\Html\Documentation\ExampleLoader;

$loader = new ExampleLoader();

$examples = $loader->load(
    __DIR__ . '/../resources/views/components/interactive/button/examples'
);


foreach ($examples as $example) {

    echo "====================\n";

    echo "File: ";
    echo $example->filename();
    echo "\n\n";

    echo "Identifier: ";
    echo $example->identifier();
    echo "\n\n";

    echo "Title: ";
    echo $example->title();
    echo "\n\n";

    echo "Description: ";
    echo $example->description() ?? 'NULL';
    echo "\n\n";

    echo "Metadata:\n";

    print_r(
        $example->metadata()
    );

    echo "\n\n";

    echo "Source:\n";

    echo $example->source();

    echo "\n\n";
}