<?php

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Collapse\Collapse;
use RedSky\Html\Components\Layout\Div\Div;
use RedSky\Html\Components\Typography\Paragraph\Paragraph;

$collapse = new Collapse(
    'What is RedSky?',
    'RedSky is a PHP component framework designed to generate reusable and UI-library-agnostic HTML components.'
);

$collapse->active();

$additionalInformation = new Div();

$additionalInformation
    ->addChild(
        new Paragraph(
            'RedSky components generate HTML structure while keeping styling and visual integration independent from the component package.'
        )
    )
    ->addChild(
        new Paragraph(
            'The content of a Collapse can be composed from other RedSky HtmlComponent objects.'
        )
    );

$secondCollapse = new Collapse(
    'Can Collapse contain HTML components?',
    $additionalInformation
);

echo $collapse;

echo $secondCollapse;
