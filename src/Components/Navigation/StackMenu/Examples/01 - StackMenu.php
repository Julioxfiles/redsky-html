<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Modal\Modal;
use RedSky\Html\Components\Interactive\Button\Button;
use RedSky\Html\Components\Navigation\Menu\Menu;
use RedSky\Html\Components\Navigation\MenuItem\MenuItem;
use RedSky\Html\Components\Navigation\StackMenu\StackMenu;


/*
 * Level 3: Laptop menu
 */

$laptopMenu = new Menu();

$laptopMenu
    ->addItem(
        (new MenuItem('Business'))
            ->href('/products/laptops/business')
    )
    ->addItem(
        (new MenuItem('Gaming'))
            ->href('/products/laptops/gaming')
    )
    ->addItem(
        (new MenuItem('Ultrabooks'))
            ->href('/products/laptops/ultrabooks')
    )
    ->addItem(
        (new MenuItem('Workstations'))
            ->href('/products/laptops/workstations')
    );


/*
 * Level 2: Products menu
 */

$productsMenu = new Menu();

$productsMenu
    ->addItem(
        (new MenuItem('Laptops'))
            ->addSubmenu($laptopMenu)
    )
    ->addItem(
        (new MenuItem('Phones'))
            ->href('/products/phones')
    )
    ->addItem(
        (new MenuItem('Tablets'))
            ->href('/products/tablets')
    )
    ->addItem(
        (new MenuItem('Accessories'))
            ->href('/products/accessories')
    )
    ->addItem(
        (new MenuItem('Software'))
            ->href('/products/software')
    )
    ->addItem(
        (new MenuItem('Offers'))
            ->href('/products/offers')
    );


/*
 * Level 2: Services menu
 */

$servicesMenu = new Menu();

$servicesMenu
    ->addItem(
        (new MenuItem('Support'))
            ->href('/services/support')
    )
    ->addItem(
        (new MenuItem('Maintenance'))
            ->href('/services/maintenance')
    )
    ->addItem(
        (new MenuItem('Training'))
            ->href('/services/training')
    );


/*
 * Level 2: Settings menu
 */

$settingsMenu = new Menu();

$settingsMenu
    ->addItem(
        (new MenuItem('Display'))
            ->href('/settings/display')
    )
    ->addItem(
        (new MenuItem('Sound'))
            ->href('/settings/sound')
    )
    ->addItem(
        (new MenuItem('Network'))
            ->href('/settings/network')
    )
    ->addItem(
        (new MenuItem('Security'))
            ->href('/settings/security')
    );


/*
 * Main menu
 */

$menu = new Menu();

$menu
    ->addItem(
        (new MenuItem('Home'))
            ->href('/')
    )
    ->addItem(
        (new MenuItem('Products'))
            ->addSubmenu($productsMenu)
    )
    ->addItem(
        (new MenuItem('Services'))
            ->addSubmenu($servicesMenu)
    )
    ->addItem(
        (new MenuItem('Settings'))
            ->addSubmenu($settingsMenu)
    )
    ->addItem(
        (new MenuItem('About'))
            ->href('/about')
    );


/*
 * StackMenu
 */

$stackMenu = new StackMenu();

$stackMenu->addMenu(
    $menu
);


/*
 * Modal
 */

$modal = new Modal();

$modal
    ->title('Stack Menu')
    ->size('small')
    ->closeOnEscape(true)
    ->closeOnBackdrop(true)
    ->trapFocus(true)
    ->body($stackMenu);


$modal->id(
    'stack-menu-demo'
);


/*
 * Button
 */

$button = new Button(
    'Open Stack Menu'
);

$button->class('btn btn-sm btn-primary');

$button->attribute(
    'data-modal-target',
    'stack-menu-demo'
);


/*
 * Render
 */

echo $button;
echo $modal;