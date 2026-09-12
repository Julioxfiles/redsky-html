<?php

declare(strict_types=1);

use RedSky\Html\Components\Interactive\Tabs\Tabs;
use RedSky\Html\Components\Interactive\Tabs\Tab;
use RedSky\Html\Components\Interactive\Tabs\TabItem;
use RedSky\Html\Components\Layout\Div\Div;
use RedSky\Html\Components\Typography\Heading\Heading;
use RedSky\Html\Components\Typography\Paragraph\Paragraph;
use RedSky\Html\Components\Form\Form\Form;
use RedSky\Html\Components\Form\TextInput\TextInput;
use RedSky\Html\Components\Form\EmailInput\EmailInput;
use RedSky\Html\Components\Interactive\Button\Button;

$tabs = new Tabs();


/*
|----------------------------------------------------------------------
| Profile tab using RedSky components
|----------------------------------------------------------------------
*/

$profile = new Div();

$profile->addChild(
    new Heading(2,'User Information')
);

$profile->addChild(
    new Paragraph('Manage your personal information.')
);

$tabs->addTab(
    new TabItem(
        new Tab('Profile'),
        $profile
    )
);


/*
|----------------------------------------------------------------------
| Settings tab using a Form
|----------------------------------------------------------------------
*/

$form = new Form();

$form->addChild(
    new TextInput('name')
);

$form->addChild(
    new EmailInput('email')
);

$form->addChild(
    new Button('Save')
);


$settings = new Div();

$settings->addChild($form);


$tabs->addTab(
    new TabItem(
        new Tab('Settings'),
        $settings
    )
);


/*
|----------------------------------------------------------------------
| Activity tab using raw HTML
|----------------------------------------------------------------------
*/

$activity = new Div();

$activity->setContent(
    '<ul>
        <li>Login today</li>
        <li>Password changed yesterday</li>
    </ul>'
);


$tabs->addTab(
    new TabItem(
        new Tab('Activity'),
        $activity
    )
);


echo $tabs;