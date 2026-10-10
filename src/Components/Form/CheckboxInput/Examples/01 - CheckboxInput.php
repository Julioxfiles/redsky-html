<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\CheckboxInput\CheckboxInput;

/**
 * CheckboxInput component examples.
 *
 * Demonstrates basic checkboxes, checked and unchecked states,
 * required fields, and disabled checkboxes.
 */
?>

<section>
    <h2>Basic Checkbox</h2>

    <?php
    echo (new CheckboxInput('notifications'))
        ->value('email');
    ?>
</section>

<section>
    <h2>Checked Checkbox</h2>

    <?php
    echo (new CheckboxInput('terms'))
        ->value('accepted')
        ->checked();
    ?>
</section>

<section>
    <h2>Unchecked Checkbox</h2>

    <?php
    echo (new CheckboxInput('newsletter'))
        ->value('subscribed')
        ->unchecked();
    ?>
</section>

<section>
    <h2>Required Checkbox</h2>

    <?php
    echo (new CheckboxInput('privacy_policy'))
        ->value('accepted')
        ->required();
    ?>
</section>

<section>
    <h2>Disabled Checkbox</h2>

    <?php
    echo (new CheckboxInput('premium_features'))
        ->value('enabled')
        ->disabled();
    ?>
</section>

<section>
    <h2>Checked and Disabled Checkbox</h2>

    <?php
    echo (new CheckboxInput('verified_account'))
        ->value('verified')
        ->checked()
        ->disabled();
    ?>
</section>
