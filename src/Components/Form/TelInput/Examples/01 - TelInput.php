<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\TelInput\TelInput;

/**
 * TelInput component examples.
 *
 * Demonstrates basic telephone input, placeholder text,
 * required fields, preset values, and disabled and readonly states.
 */
?>

<section>
    <h2>Basic Telephone Input</h2>

    <?php
    echo (new TelInput('phone'))
        ->placeholder('Enter your phone number...');
    ?>
</section>

<section>
    <h2>Required Telephone Input</h2>

    <?php
    echo (new TelInput('contact_phone'))
        ->placeholder('Phone number is required')
        ->required();
    ?>
</section>

<section>
    <h2>Telephone Input with Initial Value</h2>

    <?php
    echo (new TelInput('office_phone'))
        ->value('+1 555 123 4567');
    ?>
</section>

<section>
    <h2>Telephone Input with Autocomplete</h2>

    <?php
    echo (new TelInput('mobile_phone'))
        ->placeholder('Enter your mobile number')
        ->autocomplete('tel');
    ?>
</section>

<section>
    <h2>Readonly Telephone Input</h2>

    <?php
    echo (new TelInput('readonly_phone'))
        ->value('+1 555 987 6543')
        ->readonly();
    ?>
</section>

<section>
    <h2>Disabled Telephone Input</h2>

    <?php
    echo (new TelInput('disabled_phone'))
        ->value('+1 555 000 1234')
        ->disabled();
    ?>
</section>
