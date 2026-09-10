<?php

/**
 * Title: Disabled Button
 * Description: Creates a disabled button.
 */

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Button;


$button = new Button('Delete');

$button
    ->type('button')
    ->disabled();


echo $button;