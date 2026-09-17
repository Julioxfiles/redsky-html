<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\SwitchInput\SwitchInput;

$switch = new SwitchInput('notifications');

$switch->attribute('id', 'notifications-switch');
$switch->attribute('value', '1');
$switch->attribute('aria-label', 'Enable notifications');
$switch->checked(true);

echo $switch;

