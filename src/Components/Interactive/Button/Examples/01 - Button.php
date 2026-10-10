<?php

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Button\Button;

$button = (new Button('Send'))
    ->class('btn btn-sm btn-primary')
    ->type('button')
    ->addAttribute('id', 'save-button')
    ->name('save')
    ->value('save')
    ->addAttribute('title', 'Save the current record')
    ->addAttribute('aria-label', 'Save record');

echo $button;

$button->text('Send')->class('btn btn-sm btn-secondary');
echo $button;

$button->text('Send')->class('btn btn-sm btn-success');
echo $button;

$button->text('Send')->class('btn btn-sm btn-danger');
echo $button;

$button->text('Send')->class('btn btn-sm btn-warning');
echo $button;

$button->text('Send')->class('btn btn-sm btn-info');
echo $button;

$button->text('Send')->class('btn btn-sm btn-light');
echo $button;

$button->text('Send')->class('btn btn-sm btn-dark');
echo $button;