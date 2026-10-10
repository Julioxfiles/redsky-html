<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Badge\Badge;
use RedSky\Html\Components\Layout\Div\Div;
use RedSky\Html\Components\Typography\Heading\Heading;
use RedSky\Html\Components\Typography\Paragraph\Paragraph;

$container = new Div();

$container->addChild(
    new Heading(2, 'Badge Component')
);

$container->addChild(
    new Paragraph(
        'Badges display compact labels for statuses, categories, and notifications.'
    )
);

$container->addChild(
    new Heading(3, 'Badge Types')
);

$container->addChild(
    (new Badge('Information'))
        ->type('info')
);

$container->addChild(
    (new Badge('Active'))
        ->type('success')
);

$container->addChild(
    (new Badge('Pending'))
        ->type('warning')
);

$container->addChild(
    (new Badge('Failed'))
        ->type('danger')
);

$container->addChild(
    (new Badge('Draft'))
        ->type('secondary')
);

$container->addChild(
    new Heading(3, 'Account Status')
);

$container->addChild(
    new Paragraph(
        'Account: John Smith'
    )
);

$container->addChild(
    (new Badge('Verified'))
        ->type('success')
);

$container->addChild(
    new Paragraph(
        'Email verification is complete.'
    )
);

$container->addChild(
    new Paragraph(
        'Subscription: Professional'
    )
);

$container->addChild(
    (new Badge('Active'))
        ->type('info')
);

$container->addChild(
    new Paragraph(
        'Payment: Requires attention'
    )
);

$container->addChild(
    (new Badge('Pending'))
        ->type('warning')
);

$container->addChild(
    new Heading(3, 'Changing Badge Text')
);

$badge = new Badge('3 notifications');

$badge->type('danger');

$container->addChild($badge);

$badge->text('5 notifications');

$container->addChild($badge);

echo $container;