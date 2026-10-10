<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\WeekInput\WeekInput;

/**
 * WeekInput component examples.
 *
 * Demonstrates current week selection, specific week values,
 * date ranges, past and future restrictions, and disabled state.
 */
?>

<section>
    <h2>Basic Week Input</h2>

    <?php
    echo (new WeekInput('selected_week'));
    ?>
</section>

<section>
    <h2>Current Week</h2>

    <?php
    echo (new WeekInput('current_week'))
        ->current();
    ?>
</section>

<section>
    <h2>Specific Week</h2>

    <?php
    echo (new WeekInput('project_week'))
        ->value('2026-W34');
    ?>
</section>

<section>
    <h2>Week Range</h2>

    <?php
    echo (new WeekInput('scheduled_week'))
        ->between('2026-W10', '2026-W40')
        ->required();
    ?>
</section>

<section>
    <h2>Current and Future Weeks</h2>

    <?php
    echo (new WeekInput('future_week'))
        ->future();
    ?>
</section>

<section>
    <h2>Past and Current Weeks</h2>

    <?php
    echo (new WeekInput('past_week'))
        ->past();
    ?>
</section>

<section>
    <h2>Current Year</h2>

    <?php
    echo (new WeekInput('year_week'))
        ->currentYear();
    ?>
</section>

<section>
    <h2>Disabled Week Input</h2>

    <?php
    echo (new WeekInput('disabled_week'))
        ->current()
        ->disabled();
    ?>
</section>
