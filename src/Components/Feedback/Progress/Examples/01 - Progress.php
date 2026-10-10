<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Progress\Progress;
?>

<div class="mb-3">
    <h3>Progress</h3>
    <p>Basic progress indicators with different completion values.</p>
</div>

<div class="mb-4">
    <?= (new Progress())
        ->value(25)
        ->type('primary')
        ->label('25% complete')
        ->render() ?>
</div>

<div class="mb-4">
    <?= (new Progress())
        ->value(50)
        ->type('success')
        ->label('50% complete')
        ->render() ?>
</div>

<div class="mb-4">
    <?= (new Progress())
        ->value(75)
        ->type('warning')
        ->label('75% complete')
        ->render() ?>
</div>

<div class="mb-4">
    <?= (new Progress())
        ->value(100)
        ->type('danger')
        ->label('100% complete')
        ->render() ?>
</div>

<div class="mb-4">
    <?= (new Progress())
        ->value(60)
        ->type('info')
        ->label('60% complete')
        ->render() ?>
</div>
