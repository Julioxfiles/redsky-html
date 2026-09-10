<?php

/**
 * Title: Submit Button
 * Description: Creates a submit button.
 */

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Button;

$button = new Button('Save');

$button ->type('submit')
    ->name('action')
    ->value('save');

echo $button;