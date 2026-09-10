<?php

/**
 * Title: Basic Button
 * Description: Creates a simple button.
 */

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Button;


$button = new Button('Save');


echo $button;