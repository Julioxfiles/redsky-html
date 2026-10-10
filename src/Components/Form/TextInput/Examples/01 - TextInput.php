<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\TextInput\TextInput;

$textInput = new TextInput('username');

$textInput
    ->addAttribute('id', 'username')
    ->addAttribute('autocomplete', 'username')
    ->addAttribute('required', 'required')
    ->addAttribute('maxlength', '50')
    ->addAttribute('spellcheck', 'false')
    ->addAttribute('aria-label', 'Username')
    ->placeholder('Enter your username')
    ->value('john.doe')
    ->class('form-control')
    ->style('max-width', '400px');

echo $textInput;