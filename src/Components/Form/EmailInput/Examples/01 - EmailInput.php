<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\EmailInput\EmailInput;
?>

<section>
    <h2>Basic Email Input</h2>

    <?php
    echo new EmailInput('email');
    ?>
</section>

<section>
    <h2>Email with Placeholder</h2>

    <?php
    echo (new EmailInput('contact_email'))
        ->placeholder('Enter your email address');
    ?>
</section>

<section>
    <h2>Required Email</h2>

    <?php
    echo (new EmailInput('required_email'))
        ->placeholder('name@example.com')
        ->required();
    ?>
</section>

<section>
    <h2>Email with Value</h2>

    <?php
    echo (new EmailInput('user_email'))
        ->value('user@example.com');
    ?>
</section>

<section>
    <h2>Readonly Email</h2>

    <?php
    echo (new EmailInput('readonly_email'))
        ->value('user@example.com')
        ->readonly();
    ?>
</section>

<section>
    <h2>Disabled Email</h2>

    <?php
    echo (new EmailInput('disabled_email'))
        ->value('user@example.com')
        ->disabled();
    ?>
</section>

<section>
    <h2>Email with Autocomplete</h2>

    <?php
    echo (new EmailInput('account_email'))
        ->placeholder('Enter your account email')
        ->autocomplete('email');
    ?>
</section>
