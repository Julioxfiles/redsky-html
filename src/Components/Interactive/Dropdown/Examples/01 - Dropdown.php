<?php

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Dropdown\Dropdown;
use RedSky\Html\Components\Interactive\Dropdown\DropdownItem;
use RedSky\Html\Components\Interactive\Dropdown\DropdownMenu;
use RedSky\Html\Components\Interactive\Dropdown\DropdownToggle;

$dropdown = new Dropdown();

$dropdown
    ->addChild(
        new DropdownToggle('Actions')
    )
    ->addChild(
        (new DropdownMenu())
            ->addChild(
                (new DropdownItem('View'))
                    ->href('/users')
            )
            ->addChild(
                (new DropdownItem('Edit'))
                    ->href('/users/edit')
            )
            ->addChild(
                (new DropdownItem('Delete'))
                    ->onClick('openDeleteModal()')
            )
    );

echo $dropdown->render();
