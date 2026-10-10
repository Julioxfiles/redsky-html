<?php

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Button\Button;

$button = new Button('Send');

$button
    ->class('btn btn-sm btn-primary')
    ->addAttribute('type', 'button')
    ->addAttribute('id', 'save-button')
    ->addAttribute('name', 'save')
    ->addAttribute('value', 'save')
    ->addAttribute('title', 'Save the current record')
    ->addAttribute('aria-label', 'Save record');

echo $button;

$button->class('btn btn-sm btn-secondary');
echo $button;    

$button->class('btn btn-sm btn-success');
echo $button;    

$button->class('btn btn-sm btn-danger');
echo $button;    

$button->class('btn btn-sm btn-warning');
echo $button;    

$button->class('btn btn-sm btn-info');
echo $button;    

$button->class('btn btn-sm btn-light');
echo $button;    

$button->class('btn btn-sm btn-dark');
echo $button;    
