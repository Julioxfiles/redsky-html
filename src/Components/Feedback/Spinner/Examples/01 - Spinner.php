<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Spinner\Spinner;
?>

<div class="mb-3">
    <h3>Basic Spinner</h3>
    <p>
        A spinner can be displayed in different sizes and semantic types.
    </p>
</div>

<div class="mb-4">
    <?= (new Spinner())
        ->type('primary')
        ->size('large')
        ->label('Loading')
        ->render() ?>

    <?= (new Spinner())
        ->type('secondary')
        ->size('large')
        ->label('Loading')
        ->render() ?>        

    <?= (new Spinner())
        ->type('info')
        ->size('large')
        ->label('Loading')
        ->render() ?>

    <?= (new Spinner())
        ->type('success')
        ->size('large')
        ->label('Loading')
        ->render() ?>

    <?= (new Spinner())
        ->type('warning')
        ->size('large')
        ->label('Loading')
        ->render() ?>

    <?= (new Spinner())
        ->type('danger')
        ->size('large')
        ->label('Loading')
        ->render() ?>

    <?= (new Spinner())
        ->type('dark')
        ->size('large')
        ->label('Loading')
        ->render() ?>

    <?= (new Spinner())
        ->type('light')
        ->size('large')
        ->label('Loading')
        ->render() ?>
</div>

