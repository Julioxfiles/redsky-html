<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\ColorInput\ColorInput;
?>

<section>
    <h2>Default Color</h2>

    <?php
    echo new ColorInput('favorite_color');
    ?>
</section>

<section>
    <h2>Custom Color</h2>

    <?php
    echo (new ColorInput('brand_color'))
        ->color('#3b82f6');
    ?>
</section>

<section>
    <h2>Black</h2>

    <?php
    echo (new ColorInput('black_color'))
        ->black();
    ?>
</section>

<section>
    <h2>White</h2>

    <?php
    echo (new ColorInput('white_color'))
        ->white();
    ?>
</section>

<section>
    <h2>Red</h2>

    <?php
    echo (new ColorInput('red_color'))
        ->red();
    ?>
</section>

<section>
    <h2>Green</h2>

    <?php
    echo (new ColorInput('green_color'))
        ->green();
    ?>
</section>

<section>
    <h2>Blue</h2>

    <?php
    echo (new ColorInput('blue_color'))
        ->blue();
    ?>
</section>

<section>
    <h2>Required Color</h2>

    <?php
    echo (new ColorInput('required_color'))
        ->color('#22c55e')
        ->required();
    ?>
</section>

<section>
    <h2>Disabled Color</h2>

    <?php
    echo (new ColorInput('disabled_color'))
        ->color('#9333ea')
        ->disabled();
    ?>
</section>
