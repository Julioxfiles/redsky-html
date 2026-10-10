<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\PasswordInput\PasswordInput;
?>

<section>
    <h2>Basic Password Input</h2>

    <?php
    echo new PasswordInput('password');
    ?>
</section>

<section>
    <h2>Required Password</h2>

    <?php
    echo (new PasswordInput('required_password'))
        ->required()
        ->placeholder('Enter your password');
    ?>
</section>

<section>
    <h2>Password with Minimum Length</h2>

    <?php
    echo (new PasswordInput('new_password'))
        ->required()
        ->minlength(8)
        ->placeholder('At least 8 characters');
    ?>
</section>

<section>
    <h2>Password with Maximum Length</h2>

    <?php
    echo (new PasswordInput('limited_password'))
        ->minlength(8)
        ->maxlength(32)
        ->placeholder('8 to 32 characters');
    ?>
</section>

<section>
    <h2>Password with Pattern</h2>

    <?php
    echo (new PasswordInput('secure_password'))
        ->required()
        ->minlength(8)
        ->pattern('(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}')
        ->placeholder('Use uppercase, lowercase, and a number');
    ?>
</section>

<section>
    <h2>Autofocus Password</h2>

    <?php
    echo (new PasswordInput('login_password'))
        ->autofocus()
        ->placeholder('Enter your password');
    ?>
</section>

<section>
    <h2>Disabled Password</h2>

    <?php
    echo (new PasswordInput('disabled_password'))
        ->disabled()
        ->placeholder('Password unavailable');
    ?>
</section>

<section>
    <h2>Read-only Password</h2>

    <?php
    echo (new PasswordInput('readonly_password'))
        ->value('ExamplePassword123')
        ->readonly();
    ?>
</section>
