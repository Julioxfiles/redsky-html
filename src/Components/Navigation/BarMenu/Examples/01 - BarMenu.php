<?php

declare(strict_types=1);

use RedSky\Html\Components\Navigation\BarMenu\BarMenu;
use RedSky\Html\Components\Navigation\Menu\Menu;
use RedSky\Html\Components\Navigation\MenuItem\MenuItem;

$barMenu = new BarMenu();

$fileMenu = new Menu();

$fileMenu
    ->addItem(
        (new MenuItem('New File'))
            ->shortcut('Ctrl+N')
            ->onClick('alert("New document");')
    )
    ->addItem(
        (new MenuItem('Open File'))
            ->shortcut('Ctrl+O')
            ->onClick('alert("Open document");')
    )
    ->addItem(
        (new MenuItem('Save File'))
            ->shortcut('Ctrl+S')
            ->onClick('alert("Save document");')
    )
    ->addItem(
        (new MenuItem('Exit from notepad'))
            ->shortcut('Alt+F4')
            ->onClick('alert("Exit");')
    );

$editMenu = new Menu();

$editMenu
    ->addItem(
        (new MenuItem('Cut'))
            ->shortcut('Ctrl+X')
            ->onClick('alert("Cut");')
    )
    ->addItem(
        (new MenuItem('Copy'))
            ->shortcut('Ctrl+C')
            ->onClick('alert("Copy");')
    )
    ->addItem(
        (new MenuItem('Paste'))
            ->shortcut('Ctrl+V')
            ->onClick('alert("Paste");')
    );

$viewMenu = new Menu();

$viewMenu
    ->addItem(
        (new MenuItem('Zoom In'))
            ->shortcut('Ctrl++')
            ->onClick('alert("Zoom In");')
    )
    ->addItem(
        (new MenuItem('Zoom Out'))
            ->shortcut('Ctrl+-')
            ->onClick('alert("Zoom Out");')
    )
    ->addItem(
        (new MenuItem('Reset Zoom'))
            ->shortcut('Ctrl+0')
            ->onClick('alert("Reset Zoom");')
    );

$helpMenu = new Menu();

$helpMenu
    ->addItem(
        (new MenuItem('Documentation'))
            ->shortcut('F1')
            ->onClick('alert("Documentation");')
    )
    ->addItem(
        (new MenuItem('About'))
            ->onClick('alert("About");')
    );

$rootMenu = new Menu();

$rootMenu
    ->addItem(
        (new MenuItem('File'))
            ->addSubmenu($fileMenu)
    )
    ->addItem(
        (new MenuItem('Edit'))
            ->addSubmenu($editMenu)
    )
    ->addItem(
        (new MenuItem('View'))
            ->addSubmenu($viewMenu)
    )
    ->addItem(
        (new MenuItem('Help'))
            ->addSubmenu($helpMenu)
    );

$barMenu->addMenu($rootMenu);

echo $barMenu;