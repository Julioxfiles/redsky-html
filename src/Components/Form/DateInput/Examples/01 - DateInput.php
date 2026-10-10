<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\DateInput\DateInput;
?>

<section>
    <h2>Default Date</h2>

    <?php
    echo new DateInput('appointment_date');
    ?>
</section>

<section>
    <h2>Today</h2>

    <?php
    echo (new DateInput('today_date'))
        ->today();
    ?>
</section>

<section>
    <h2>Required Date</h2>

    <?php
    echo (new DateInput('required_date'))
        ->required();
    ?>
</section>

<section>
    <h2>Past Dates</h2>

    <?php
    echo (new DateInput('past_date'))
        ->past();
    ?>
</section>

<section>
    <h2>Future Dates</h2>

    <?php
    echo (new DateInput('future_date'))
        ->future();
    ?>
</section>

<section>
    <h2>Minimum Date Is Today</h2>

    <?php
    echo (new DateInput('minimum_today'))
        ->minimumToday();
    ?>
</section>

<section>
    <h2>Maximum Date Is Today</h2>

    <?php
    echo (new DateInput('maximum_today'))
        ->maximumToday();
    ?>
</section>

<section>
    <h2>Date Range</h2>

    <?php
    echo (new DateInput('date_range'))
        ->between('2026-01-01', '2026-12-31')
        ->required();
    ?>
</section>

<section>
    <h2>Disabled Date</h2>

    <?php
    echo (new DateInput('disabled_date'))
        ->today()
        ->disabled();
    ?>
</section>
