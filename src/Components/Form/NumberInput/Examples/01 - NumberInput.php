<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\NumberInput\NumberInput;
?>

<section>
    <h2>Basic Number Input</h2>

    <?php
    echo new NumberInput('quantity');
    ?>
</section>

<section>
    <h2>Required Number</h2>

    <?php
    echo (new NumberInput('required_quantity'))
        ->required()
        ->placeholder('Enter a quantity');
    ?>
</section>

<section>
    <h2>Integer Input</h2>

    <?php
    echo (new NumberInput('age'))
        ->integer()
        ->between(0, 120)
        ->required();
    ?>
</section>

<section>
    <h2>Decimal Input</h2>

    <?php
    echo (new NumberInput('price'))
        ->decimal()
        ->min(0)
        ->placeholder('0.00')
        ->required();
    ?>
</section>

<section>
    <h2>Positive Numbers</h2>

    <?php
    echo (new NumberInput('positive_number'))
        ->positive()
        ->integer();
    ?>
</section>

<section>
    <h2>Negative Numbers</h2>

    <?php
    echo (new NumberInput('negative_number'))
        ->negative()
        ->decimal();
    ?>
</section>

<section>
    <h2>Minimum and Maximum Values</h2>

    <?php
    echo (new NumberInput('rating'))
        ->between(1, 5)
        ->integer()
        ->required();
    ?>
</section>

<section>
    <h2>Percentage</h2>

    <?php
    echo (new NumberInput('completion'))
        ->percentage()
        ->value(75)
        ->required();
    ?>
</section>

<section>
    <h2>Price with Two Decimal Places</h2>

    <?php
    echo (new NumberInput('product_price'))
        ->decimal(0.01)
        ->min(0)
        ->value('19.99')
        ->required();
    ?>
</section>

<section>
    <h2>Number with Custom Step</h2>

    <?php
    echo (new NumberInput('measurement'))
        ->decimal(0.5)
        ->between(0, 100)
        ->value(10);
    ?>
</section>

<section>
    <h2>Disabled Number Input</h2>

    <?php
    echo (new NumberInput('disabled_number'))
        ->value(100)
        ->disabled();
    ?>
</section>

<section>
    <h2>Read-only Number Input</h2>

    <?php
    echo (new NumberInput('reference_number'))
        ->value(250)
        ->readonly();
    ?>
</section>
