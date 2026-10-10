<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\TimeInput\TimeInput;

/**
 * TimeInput component examples.
 *
 * Demonstrates current time, specific values, time ranges,
 * business hours, and disabled states.
 */

?>

<section>
    <h2>Current Time</h2>

    <?php
    echo (new TimeInput('appointment_time'))
        ->now();
    ?>
</section>

<section>
    <h2>Specific Time</h2>

    <?php
    echo (new TimeInput('meeting_time'))
        ->value('10:30');
    ?>
</section>

<section>
    <h2>Between Specific Times</h2>

    <?php
    echo (new TimeInput('delivery_time'))
        ->between('09:00', '16:00')
        ->required();
    ?>
</section>

<section>
    <h2>Business Hours</h2>

    <?php
    echo (new TimeInput('business_time'))
        ->businessHours();
    ?>
</section>

<section>
    <h2>Morning</h2>

    <?php
    echo (new TimeInput('morning_time'))
        ->morning();
    ?>
</section>

<section>
    <h2>Afternoon</h2>

    <?php
    echo (new TimeInput('afternoon_time'))
        ->afternoon();
    ?>
</section>

<section>
    <h2>Evening</h2>

    <?php
    echo (new TimeInput('evening_time'))
        ->evening();
    ?>
</section>

<section>
    <h2>Disabled Input</h2>

    <?php
    echo (new TimeInput('reserved_time'))
        ->value('12:00')
        ->disabled();
    ?>
</section>
