<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\RadioInput\RadioInput;

/**
 * RadioInput component examples.
 *
 * Demonstrates radio buttons, grouped options, checked states,
 * and disabled states.
 */
?>

<section>
    <h2>Basic Radio Input</h2>

    <?php
    echo (new RadioInput('contact_method'))
        ->value('email');
    ?>
</section>

<section>
    <h2>Radio Group</h2>

    <fieldset>
        <legend>Select a contact method</legend>

        <?php
        echo (new RadioInput('contact_method'))
            ->value('email')
            ->checked();
        ?>
        <label>Email</label>

        <?php
        echo (new RadioInput('contact_method'))
            ->value('phone');
        ?>
        <label>Phone</label>

        <?php
        echo (new RadioInput('contact_method'))
            ->value('sms');
        ?>
        <label>Text message</label>
    </fieldset>
</section>

<section>
    <h2>Preselected Option</h2>

    <?php
    echo (new RadioInput('subscription'))
        ->value('monthly')
        ->checked();
    ?>
    <label>Monthly subscription</label>

    <?php
    echo (new RadioInput('subscription'))
        ->value('yearly');
    ?>
    <label>Yearly subscription</label>
</section>

<section>
    <h2>Disabled Radio Input</h2>

    <?php
    echo (new RadioInput('account_type'))
        ->value('premium')
        ->disabled();
    ?>
    <label>Premium account</label>
</section>

<section>
    <h2>Unchecked Radio Input</h2>

    <?php
    echo (new RadioInput('notification'))
        ->value('push')
        ->unchecked();
    ?>
    <label>Push notifications</label>
</section>
