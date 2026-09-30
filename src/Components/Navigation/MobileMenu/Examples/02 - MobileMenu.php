<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Modal\Modal;
use RedSky\Html\Components\Form\SwitchInput\SwitchInput;
use RedSky\Html\Components\Layout\Card\Card;
use RedSky\Html\Components\Media\Image\Image;
use RedSky\Html\Components\Navigation\Link\Link;
use RedSky\Html\Components\Navigation\Menu\Menu;
use RedSky\Html\Components\Navigation\MenuItem\MenuItem;
use RedSky\Html\Components\Navigation\MobileMenu\MobileMenu;
use RedSky\Html\Components\Typography\Text\Text;
use RedSky\Html\Components\Interactive\Button\Button;



/*
|--------------------------------------------------------------------------
| Network cards
|--------------------------------------------------------------------------
*/


$wifiCard =
    (new Card())
        ->class('mobile-card')
        ->image(
            (new Image(
                '/assets/images/wifi.png'
            ))
            ->zoomable()
        )
        ->title(
            'WiFi'
        )
        ->bodyContent(
            'Wireless connection settings'
        )
        ->action(
            new SwitchInput(
                'wifi',
                true
            )
        );


$bluetoothCard =
    (new Card())
        ->class('mobile-card')
        ->image(
            (new Image(
                '/assets/images/bluetooth.png'
            ))
            ->zoomable()
        )
        ->title(
            'Bluetooth'
        )
        ->bodyContent(
            'Connect external devices'
        )
        ->action(
            new SwitchInput(
                'bluetooth'
            )
        );


$mobileDataCard =
    (new Card())
        ->class('mobile-card')
        ->image(
            (new Image(
                '/assets/images/mobile-data.png'
            ))
            ->zoomable()
        )
        ->title(
            'Mobile Data'
        )
        ->bodyContent(
            'Enable mobile internet connection'
        )
        ->action(
            new SwitchInput(
                'mobile-data',
                true
            )
        );



/*
|--------------------------------------------------------------------------
| Network submenu
|--------------------------------------------------------------------------
*/

$networkMenu =
    new Menu();


$networkMenu
    ->addItem(
        (new MenuItem())
            ->addChild(
                $wifiCard
            )
    )
    ->addItem(
        (new MenuItem())
            ->addChild(
                $bluetoothCard
            )
    )
    ->addItem(
        (new MenuItem())
            ->addChild(
                $mobileDataCard
            )
    );



/*
|--------------------------------------------------------------------------
| Display cards
|--------------------------------------------------------------------------
*/


$darkModeCard =
    (new Card())
        ->class('mobile-card')
        ->image(
            new Image(
                '/assets/images/dark-mode.png'
            )
        )
        ->title(
            'Dark Mode'
        )
        ->bodyContent(
            'Change application appearance'
        )
        ->action(
            new SwitchInput(
                'dark-mode'
            )
        );



$displayMenu =
    new Menu();


$displayMenu
    ->addItem(
        (new MenuItem())
            ->addChild(
                $darkModeCard
            )
    );



/*
|--------------------------------------------------------------------------
| Account submenu
|--------------------------------------------------------------------------
*/


$accountCard =
    (new Card())
        ->class('mobile-card')
        ->image(
            new Image(
                '/assets/images/account.png'
            )
        )
        ->title(
            'Account'
        )
        ->bodyContent(
            'Manage your profile settings'
        )
        ->action(
            new Link(
                '/account',
                'Open account'
            )
        );


$accountMenu =
    new Menu();


$accountMenu
    ->addItem(
        (new MenuItem())
            ->addChild(
                $accountCard
            )
    );



/*
|--------------------------------------------------------------------------
| Main menu
|--------------------------------------------------------------------------
*/


$settingsMenu =
    new Menu();


$settingsMenu

    ->addItem(
        (new MenuItem(
            'Network'
        ))
        ->addSubmenu(
            $networkMenu
        )
    )

    ->addItem(
        (new MenuItem(
            'Display'
        ))
        ->addSubmenu(
            $displayMenu
        )
    )

    ->addItem(
        (new MenuItem(
            'Account'
        ))
        ->addSubmenu(
            $accountMenu
        )
    );



/*
|--------------------------------------------------------------------------
| MobileMenu
|--------------------------------------------------------------------------
*/


$mobileMenu =
    new MobileMenu();


$mobileMenu
    ->addMenu(
        $settingsMenu
    );



/*
|--------------------------------------------------------------------------
| Modal
|--------------------------------------------------------------------------
*/


$modal =
    new Modal();


$modal
    ->id(
        'phone-settings-menu'
    )
    ->title(
        'Phone Settings'
    )
    ->size(
        'small'
    )
    ->closeOnEscape(
        true
    )
    ->closeOnBackdrop(
        true
    )
    ->trapFocus(
        true
    )
    ->body(
        $mobileMenu
    );



/*
|--------------------------------------------------------------------------
| Button
|--------------------------------------------------------------------------
*/


$button =
    new Button(
        'Open Phone Settings'
    );


$button->attribute(
    'data-modal-target',
    'phone-settings-menu'
);



/*
|--------------------------------------------------------------------------
| Render
|--------------------------------------------------------------------------
*/


echo $button;

echo $modal;