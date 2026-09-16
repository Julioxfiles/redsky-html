<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\TextInput\TextInput;

$textInput = new TextInput('username');

$textInput
    ->attribute('id', 'username')
    ->attribute('autocomplete', 'username')
    ->attribute('required', 'required')
    ->attribute('maxlength', '50')
    ->attribute('spellcheck', 'false')
    ->attribute('aria-label', 'Username')
    ->placeholder('Enter your username')
    ->value('john.doe')
    ->class('form-control')
    ->style('max-width', '400px');

echo $textInput;