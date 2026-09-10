<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use RedSky\Html\Documentation\ExampleFile;


$example = new ExampleFile(
    file: __DIR__ . '/../resources/views/components/interactive/button/examples/01-basic.php',
    metadata: [
        'Title' => 'Basic Button',
        'Description' => 'Creates a simple button.',
        'Category' => 'Interactive',
    ],
    source: '<?php echo "example";',
    output: ''
);


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
echo $example->description();
echo "\n\n";


echo "Metadata:\n";

print_r(
    $example->metadata()
);


echo "\nOutput before:\n";

var_dump(
    $example->output()
);


$example->setOutput(
    '<button>Save</button>'
);


echo "\nOutput after:\n";

echo $example->output();


echo "\n\nArray:\n";

print_r(
    $example->toArray()
);