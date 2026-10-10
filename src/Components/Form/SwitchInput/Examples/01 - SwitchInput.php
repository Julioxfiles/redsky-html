<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\SwitchInput\SwitchInput;

$switch = new SwitchInput('notifications');

$switch->addAttribute('id', 'notifications-switch');
$switch->addAttribute('value', '1');
$switch->addAttribute('aria-label', 'Enable notifications');
$switch->checked(true);

echo $switch;

