<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\Input\Input;
use RedSky\Html\Components\Form\TextArea\TextArea;
?>

<section>
    <h2>Text Input</h2>

    <?php
    echo (new Input('text', 'username'))
        ->placeholder('Enter your username')
        ->required()
        ->autocomplete('username');
    ?>
</section>

<section>
    <h2>Email Input</h2>

    <?php
    echo (new Input('email', 'email'))
        ->placeholder('name@example.com')
        ->required()
        ->autocomplete('email');
    ?>
</section>

<section>
    <h2>URL Input</h2>

    <?php
    echo (new Input('url', 'website'))
        ->placeholder('https://example.com')
        ->autocomplete('url');
    ?>
</section>

<section>
    <h2>Password Input</h2>

    <?php
    echo (new Input('password', 'password'))
        ->placeholder('Enter your password')
        ->required()
        ->minlength(8)
        ->autocomplete('new-password');
    ?>
</section>

<section>
    <h2>Search Input</h2>

    <?php
    echo (new Input('search', 'search'))
        ->placeholder('Search...');
    ?>
</section>

<section>
    <h2>Telephone Input</h2>

    <?php
    echo (new Input('tel', 'phone'))
        ->placeholder('Enter your phone number')
        ->autocomplete('tel')
        ->inputmode('tel');
    ?>
</section>

<section>
    <h2>Number Input</h2>

    <?php
    echo (new Input('number', 'quantity'))
        ->min(1)
        ->max(100)
        ->step(1)
        ->value(1)
        ->required();
    ?>
</section>

<section>
    <h2>Date Input</h2>

    <?php
    echo (new Input('date', 'appointment_date'))
        ->min('2026-01-01')
        ->max('2026-12-31')
        ->required();
    ?>
</section>

<section>
    <h2>Time Input</h2>

    <?php
    echo (new Input('time', 'appointment_time'))
        ->min('08:00')
        ->max('18:00')
        ->required();
    ?>
</section>

<section>
    <h2>Month Input</h2>

    <?php
    echo new Input('month', 'billing_month');
    ?>
</section>

<section>
    <h2>Week Input</h2>

    <?php
    echo new Input('week', 'reporting_week');
    ?>
</section>

<section>
    <h2>Datetime Local Input</h2>

    <?php
    echo (new Input('datetime-local', 'event_datetime'))
        ->required();
    ?>
</section>

<section>
    <h2>Checkbox Input</h2>

    <?php
    echo (new Input('checkbox', 'terms'))
        ->value('accepted')
        ->required();
    ?>
</section>

<section>
    <h2>Radio Input</h2>

    <?php
    echo (new Input('radio', 'payment_method'))
        ->value('card')
        ->checked();
    ?>

    <?php
    echo (new Input('radio', 'payment_method'))
        ->value('cash');
    ?>
</section>

<section>
    <h2>Range Input</h2>

    <?php
    echo (new Input('range', 'volume'))
        ->min(0)
        ->max(100)
        ->step(10)
        ->value(50);
    ?>
</section>

<section>
    <h2>Color Input</h2>

    <?php
    echo (new Input('color', 'theme_color'))
        ->value('#3b82f6');
    ?>
</section>

<section>
    <h2>File Input</h2>

    <?php
    echo (new Input('file', 'attachment'))
        ->accept('.pdf,.doc,.docx');
    ?>
</section>

<section>
    <h2>Disabled Input</h2>

    <?php
    echo (new Input('text', 'account_id'))
        ->value('ACC-1001')
        ->disabled();
    ?>
</section>

<section>
    <h2>Read-only Input</h2>

    <?php
    echo (new Input('text', 'reference'))
        ->value('REF-2026-001')
        ->readonly();
    ?>
</section>

<section>
    <h2>TextArea</h2>

    <?php
    echo (new TextArea('comments'))
        ->placeholder('Enter your comments');
    ?>
</section>
