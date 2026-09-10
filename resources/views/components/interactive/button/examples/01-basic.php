<?php
declare(strict_types=1);

/**
 * Title: Basic Button
 * Description: Creates a simple button.
 */

use RedSky\Html\Components\Interactive\Button;
$button = new Button('Save');

$button->id('save-button')
    ->name('action')
    ->type('submit')
    ->value('save')
    ->disabled(false)
    ->form('user-form')
    ->formaction('/users/save')
    ->formenctype('multipart/form-data')
    ->formmethod('post')
    ->formnovalidate(true)
    ->formtarget('_self')
    ->class('btn btn-primary')
    ->style('margin-top', '10px')
    ->title('Save user changes')
    ->role('button')
    ->data('action', 'save')
    ->aria('label', 'Save user information');

echo $button->render();