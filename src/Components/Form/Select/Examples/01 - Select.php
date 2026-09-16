<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\Select\Select;

$select = new Select();

$select
    ->class('select')
    ->name('country')
    ->attribute('id', 'country')
    ->attribute('title', 'Select your country')
    ->attribute('aria-label', 'Country')
    ->required();


$select->addOption('Select a country', '');

$select->addOption('Mexico', 'mx');

$select->addOption('United States', 'us');

$select->addOption('Canada', 'ca');

$select->addOption('Brazil', 'br');

$select->addOption('Argentina', 'ar');

$select->addOption('Spain', 'es');

$select->selected('mx');

echo $select;
