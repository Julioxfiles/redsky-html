<?php
declare(strict_types=1);

use RedSky\Html\Components\Feedback\Tooltip\Tooltip;
use RedSky\Html\Components\Graphics\Icon\Icon;

/**
 * Tooltip component examples.
 *
 * @package RedSky\Html\Components\Feedback\Tooltip
 */

// 1. Dark tooltip with blue icon
$tooltip = (new Tooltip('Save changes'))
    ->position('top')
    ->background('#252525')
    ->color('#ffffff')
    ->addChild(
        (new Icon('save'))
            ->style('color', '#3498db')
    );

echo $tooltip->render();


// 2. Green tooltip with white icon
$tooltip = (new Tooltip('Delete this record'))
    ->position('right')
    ->background('#27ae60')
    ->color('#ffffff')
    ->addChild(
        (new Icon('trash'))
            ->style('color', '#e74c3c')
    );

echo $tooltip->render();


// 3. Cyan tooltip with dark icon
$tooltip = (new Tooltip('More information'))
    ->position('bottom')
    ->background('#00bcd4')
    ->color('#000000')
    ->addChild(
        (new Icon('info'))
            ->style('color', '#9b59b6')
    );

echo $tooltip->render();


// 4. Dark tooltip with orange icon
$tooltip = (new Tooltip('Edit profile'))
    ->position('left')
    ->background('#191919')
    ->color('#ffffff')
    ->addChild(
        (new Icon('pencil'))
            ->style('color', '#f39c12')
    );

echo $tooltip->render();


// 5. Orange tooltip with blue icon
$tooltip = (new Tooltip('Save your changes'))
    ->position('top')
    ->background('#f39c12')
    ->color('#ffffff')
    ->addChild(
        (new Icon('save'))
            ->style('color', '#2980b9')
    );

echo $tooltip->render();
