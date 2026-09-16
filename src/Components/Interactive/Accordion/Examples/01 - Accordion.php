<?php

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Accordion\Accordion;
use RedSky\Html\Components\Interactive\Accordion\AccordionItem;
use RedSky\Html\Components\Layout\Div\Div;
use RedSky\Html\Components\Typography\Paragraph\Paragraph;

$accordion = new Accordion();

$redskyContent = new Div();

$redskyContent
    ->addChild(
        new Paragraph(
            'RedSky is a PHP component framework designed to generate reusable and UI-library-agnostic HTML components.'
        )
    )
    ->addChild(
        new Paragraph(
            'Components generate HTML structure while visual styling and themes are handled by the UI layer.'
        )
    );

$bootstrapContent = new Div();

$bootstrapContent
    ->addChild(
        new Paragraph(
            'RedSky does not require Bootstrap or any other CSS framework.'
        )
    )
    ->addChild(
        new Paragraph(
            'Its components use Bootstrap-compatible naming conventions while keeping the implementation independent from Bootstrap.'
        )
    );

$componentContent = new Div();

$componentContent
    ->addChild(
        new Paragraph(
            'An AccordionItem can contain plain text or another HtmlComponent.'
        )
    )
    ->addChild(
        new Paragraph(
            'Using HtmlComponent objects allows the content to be composed from other RedSky components.'
        )
    );

$behaviorContent = new Div();

$behaviorContent
    ->addChild(
        new Paragraph(
            'The Accordion manages its items and generates the required identifiers and accessibility attributes.'
        )
    )
    ->addChild(
        new Paragraph(
            'The JavaScript behavior controls opening and closing the collapsible content panels.'
        )
    );

$accordion
    ->addItem(
        new AccordionItem(
            'What is RedSky?',
            $redskyContent
        )
    )
    ->addItem(
        new AccordionItem(
            'Is RedSky dependent on Bootstrap?',
            $bootstrapContent
        )
    )
    ->addItem(
        new AccordionItem(
            'Can an Accordion contain HTML components?',
            $componentContent
        )
    )
    ->addItem(
        new AccordionItem(
            'How does the Accordion work?',
            $behaviorContent
        )
    );

echo $accordion;
