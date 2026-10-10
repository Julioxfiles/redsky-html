<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\Label\Label;
use RedSky\Html\Components\Form\Input\Input;
use RedSky\Html\Components\Form\TextArea\TextArea;
use RedSky\Html\Components\Form\CheckboxInput\CheckboxInput;
?>

<section>
    <h2>Basic Label</h2>

    <?php
    echo new Label('Username');
    ?>
</section>

<section>
    <h2>Label Associated with Text Input</h2>

    <?php
    echo (new Label('Full name'))
        ->for('full_name');

    echo (new Input('text', 'full_name'))
        ->addAttribute('id', 'full_name')
        ->placeholder('Enter your full name')
        ->required();
    ?>
</section>

<section>
    <h2>Email Label</h2>

    <?php
    echo (new Label('Email address'))
        ->for('email_address');

    echo (new Input('email', 'email_address'))
        ->addAttribute('id', 'email_address')
        ->placeholder('name@example.com')
        ->required()
        ->autocomplete('email');
    ?>
</section>

<section>
    <h2>Label with Title</h2>

    <?php
    echo (new Label('Phone number'))
        ->for('phone')
        ->title('Enter your contact phone number');

    echo (new Input('tel', 'phone'))
        ->addAttribute('id', 'phone')
        ->placeholder('Enter your phone number');
    ?>
</section>

<section>
    <h2>Label with Access Key</h2>

    <?php
    echo (new Label('Search'))
        ->for('search')
        ->accesskey('s');

    echo (new Input('search', 'search'))
        ->addAttribute('id', 'search')
        ->placeholder('Search...');
    ?>
</section>

<section>
    <h2>Label for TextArea</h2>

    <?php
    echo (new Label('Comments'))
        ->for('comments');

    echo (new TextArea('comments'))
        ->addAttribute('id', 'comments')
        ->placeholder('Write your comments');
    ?>
</section>

<section>
    <h2>Label for Checkbox</h2>

    <?php
    echo (new CheckboxInput('terms'))
        ->addAttribute('id', 'terms')
        ->required();

    echo (new Label('I accept the terms and conditions'))
        ->for('terms');
    ?>
</section>

<section>
    <h2>Label with Required Indicator</h2>

    <?php
    echo (new Label('Password'))
        ->for('password')
        ->addClass('required');

    echo (new Input('password', 'password'))
        ->addAttribute('id', 'password')
        ->required()
        ->minlength(8);
    ?>
</section>

<section>
    <h2>Disabled Label</h2>

    <?php
    echo (new Label('Disabled field'))
        ->for('disabled_field')
        ->addClass('disabled');

    echo (new Input('text', 'disabled_field'))
        ->addAttribute('id', 'disabled_field')
        ->disabled();
    ?>
</section>
