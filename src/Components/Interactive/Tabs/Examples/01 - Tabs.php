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
|--------------------------------------------------------------------------
| Profile tab
|--------------------------------------------------------------------------
*/

$profile = new Div();

$profile->addChild(
    new Heading(2, 'User Profile')
);

$profile->addChild(
    new Paragraph(
        'Manage your personal information and account details.'
    )
);

$profile->addChild(
    new Heading(3, 'Personal Information')
);

$profile->addChild(
    new Paragraph('Full name: John Smith')
);

$profile->addChild(
    new Paragraph('Email address: john.smith@example.com')
);

$profile->addChild(
    new Paragraph('Username: johnsmith')
);

$profile->addChild(
    new Paragraph('Account type: Administrator')
);

$profile->addChild(
    new Paragraph('Member since: January 15, 2024')
);

$profile->addChild(
    new Heading(3, 'About')
);

$profile->addChild(
    new Paragraph(
        'Software developer interested in web technologies, application architecture, and database design.'
    )
);

$tabs->addTab(
    new TabItem(
        new Tab('Profile'),
        $profile
    )
);

/*
|--------------------------------------------------------------------------
| Settings tab
|--------------------------------------------------------------------------
*/

$settings = new Div();

$settings->addChild(
    new Heading(2, 'Account Settings')
);

$settings->addChild(
    new Paragraph(
        'Update your account information using the form below.'
    )
);

$form = new Form();

$form->addChild(
    new Heading(3, 'Contact Information')
);

$form->addChild(
    new TextInput('name')
);

$form->addChild(
    new EmailInput('email')
);

$form->addChild(
    new Heading(3, 'Preferences')
);

$form->addChild(
    new Paragraph(
        'Choose your account preferences and keep your information up to date.'
    )
);

$form->addChild(
    new Button('Save Changes')
);

$settings->addChild($form);

$settings->addChild(
    new Heading(3, 'Security')
);

$settings->addChild(
    new Paragraph(
        'Last password change: September 20, 2026'
    )
);

$settings->addChild(
    new Paragraph(
        'Two-factor authentication: Enabled'
    )
);

$tabs->addTab(
    new TabItem(
        new Tab('Settings'),
        $settings
    )
);

/*
|--------------------------------------------------------------------------
| Notifications tab
|--------------------------------------------------------------------------
*/

$notifications = new Div();

$notifications->addChild(
    new Heading(2, 'Notifications')
);

$notifications->addChild(
    new Paragraph(
        'Review your recent notifications and account updates.'
    )
);

$notifications->addChild(
    new Heading(3, 'New Notifications')
);

$notifications->addChild(
    new Paragraph(
        'New login detected from your Windows desktop.'
    )
);

$notifications->addChild(
    new Paragraph(
        'Your profile information was updated successfully.'
    )
);

$notifications->addChild(
    new Paragraph(
        'A new version of the application is available.'
    )
);

$notifications->addChild(
    new Heading(3, 'Earlier Notifications')
);

$notifications->addChild(
    new Paragraph(
        'Your password was changed successfully.'
    )
);

$notifications->addChild(
    new Paragraph(
        'Your account security settings were reviewed.'
    )
);

$tabs->addTab(
    new TabItem(
        new Tab('Notifications'),
        $notifications
    )
);

/*
|--------------------------------------------------------------------------
| Activity tab
|--------------------------------------------------------------------------
*/

$activity = new Div();

$activity->addChild(
    new Heading(2, 'Recent Activity')
);

$activity->addChild(
    new Paragraph(
        'This section shows the latest actions performed on your account.'
    )
);

$activity->setContent(
    '<ul>
        <li>
            <strong>October 10, 2026</strong>
            <p>Signed in to the application.</p>
        </li>
        <li>
            <strong>October 9, 2026</strong>
            <p>Updated personal information.</p>
        </li>
        <li>
            <strong>October 8, 2026</strong>
            <p>Reviewed account security settings.</p>
        </li>
        <li>
            <strong>October 7, 2026</strong>
            <p>Changed notification preferences.</p>
        </li>
        <li>
            <strong>October 5, 2026</strong>
            <p>Changed account password.</p>
        </li>
    </ul>'
);

$activity->addChild(
    new Heading(3, 'Account Summary')
);

$activity->addChild(
    new Paragraph('Total sessions: 128')
);

$activity->addChild(
    new Paragraph('Successful logins: 124')
);

$activity->addChild(
    new Paragraph('Failed login attempts: 4')
);

$tabs->addTab(
    new TabItem(
        new Tab('Activity'),
        $activity
    )
);

echo $tabs;