<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\MonthInput\MonthInput;
?>

<section>
    <h2>Default Month Input</h2>

    <?php
    echo new MonthInput('billing_month');
    ?>
</section>

<section>
    <h2>Current Month</h2>

    <?php
    echo (new MonthInput('current_month'))
        ->current();
    ?>
</section>

<section>
    <h2>Required Month</h2>

    <?php
    echo (new MonthInput('required_month'))
        ->required();
    ?>
</section>

<section>
    <h2>Month Range</h2>

    <?php
    echo (new MonthInput('month_range'))
        ->between('2026-01', '2026-12')
        ->required();
    ?>
</section>

<section>
    <h2>Future Months</h2>

    <?php
    echo (new MonthInput('future_month'))
        ->future();
    ?>
</section>

<section>
    <h2>Past Months</h2>

    <?php
    echo (new MonthInput('past_month'))
        ->past();
    ?>
</section>

<section>
    <h2>Current Year</h2>

    <?php
    echo (new MonthInput('current_year_month'))
        ->currentYear()
        ->required();
    ?>
</section>

<section>
    <h2>Disabled Month</h2>

    <?php
    echo (new MonthInput('disabled_month'))
        ->current()
        ->disabled();
    ?>
</section>

<section>
    <h2>Read-only Month</h2>

    <?php
    echo (new MonthInput('readonly_month'))
        ->current()
        ->readonly();
    ?>
</section>
