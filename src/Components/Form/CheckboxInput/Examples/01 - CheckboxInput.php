<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\CheckboxInput\CheckboxInput;

$checkbox = new CheckboxInput('terms');

$checkbox
    ->attribute('id', 'terms')
    ->attribute('value', 'accepted')
    ->attribute('required', 'required')
    ->attribute('aria-describedby', 'terms-help')
    ->class('form-check-input');

echo $checkbox;
