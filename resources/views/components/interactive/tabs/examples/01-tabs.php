<?php

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Tabs\Tabs;
use RedSky\Html\Components\Interactive\Tabs\Tab;
use RedSky\Html\Components\Interactive\Tabs\TabItem;
use RedSky\Html\Components\Layout\Div;


/*
|--------------------------------------------------------------------------
| Basic Tabs Example
|--------------------------------------------------------------------------
*/


$tabs = new Tabs();
$tabs->class(
    'tabs'
);

/*
|--------------------------------------------------------------------------
| First Tab
|--------------------------------------------------------------------------
*/

$userContent = new Div();
$userTitle = new Div();
$userTitle->setContent('User Information');
$userContent->addChild($userTitle);

$userName = new Div();
$userName->setContent('Name: John Smith');
$userContent->addChild($userName);

$userEmail = new Div();
$userEmail->setContent('Email: john@example.com');
$userContent->addChild($userEmail);

$tabs->addTab(
    new TabItem(
        new Tab('User'),
        $userContent
    )
);

/*
|--------------------------------------------------------------------------
| Second Tab
|--------------------------------------------------------------------------
*/

$settingsContent = new Div();
$settingsTitle = new Div();
$settingsTitle->setContent(
    'Settings'
);
$settingsContent->addChild(
    $settingsTitle
);

$theme = new Div();
$theme->setContent(
    'Theme: Dark'
);
$settingsContent->addChild(
    $theme
);

$language = new Div();
$language->setContent(
    'Language: English'
);

$settingsContent->addChild(
    $language
);

$tabs->addTab(
    new TabItem(
        new Tab('Settings'),
        $settingsContent
    )
);

/*
|--------------------------------------------------------------------------
| Third Tab
|--------------------------------------------------------------------------
*/
$activityContent = new Div();
$activityTitle = new Div();
$activityTitle->setContent(
    'Recent Activity'
);
$activityContent->addChild(
    $activityTitle
);

$login = new Div();
$login->setContent(
    'Login: Today'
);
$activityContent->addChild(
    $login
);

$update = new Div();
$update->setContent(
    'Last update: Yesterday'
);
$activityContent->addChild(
    $update
);

$tabs->addTab(
    new TabItem(
        new Tab('Activity'),
        $activityContent
    )
);

/*
|--------------------------------------------------------------------------
| Select active tab
|--------------------------------------------------------------------------
|
| 0 = User
| 1 = Settings
| 2 = Activity
|
*/

$tabs->active(1);

/*
|--------------------------------------------------------------------------
| Render
|--------------------------------------------------------------------------
*/

echo $tabs;