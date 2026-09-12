<?php

declare(strict_types=1);

use RedSky\Html\Components\Document\RawHtml;
use RedSky\Html\Components\Interactive\Tabs\Tabs;
use RedSky\Html\Components\Interactive\Tabs\Tab;
use RedSky\Html\Components\Interactive\Tabs\TabItem;


$tabs = new Tabs();


/*
|--------------------------------------------------------------------------
| Profile tab using RedSky components
|--------------------------------------------------------------------------
*/

$profile = new RawHtml(
    '
    <div class="profile">
        <h3>John Smith</h3>
        <p>Email: john@example.com</p>
        <p>Role: Administrator</p>
    </div>
    '
);

$tabs->addTab(
    new TabItem(
        new Tab('Profile'),
        $profile
    )
);


/*
|--------------------------------------------------------------------------
| Settings tab using raw HTML
|--------------------------------------------------------------------------
*/

$settingsHtml = '
<form>
    <label>
        Name:
        <input type="text" value="John Smith">
    </label>

    <br>

    <label>
        Theme:
        <select>
            <option>Light</option>
            <option selected>Dark</option>
        </select>
    </label>

    <br>

    <button type="submit">
        Save
    </button>
</form>
';


$tabs->addTab(
    new TabItem(
        new Tab('Settings'),
        new RawHtml($settingsHtml)
    )
);


/*
|--------------------------------------------------------------------------
| Activity tab using raw HTML list
|--------------------------------------------------------------------------
*/

$activity = new RawHtml(
    '
    <ul>
        <li>Logged in today</li>
        <li>Updated profile yesterday</li>
        <li>Changed password last week</li>
    </ul>
    '
);


$tabs->addTab(
    new TabItem(
        new Tab('Activity'),
        $activity
    )
);


$tabs->active(1);


echo $tabs;