<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Spinner\Spinner;
use RedSky\Html\Components\Interactive\Button\Button;
?>

<!--
    This example requires its own container because the documentation
    page may render multiple Spinner components at the same time.
    JavaScript queries must remain scoped to this container.
-->
<div data-example-container="spinner-javascript">

    <div class="mb-3">
        <h3>Spinner with JavaScript</h3>
        <p>
            Show a spinner while a process is running and hide it when
            the process is completed.
        </p>
    </div>

    <div class="mb-3">
        <?= (new Spinner())
            ->type('primary')
            ->size('medium')
            ->label('Processing...')
            ->addAttribute('hidden', 'hidden')
            ->render() ?>
    </div>

    <div class="mb-3">
        <strong data-spinner-status>Ready to start</strong>
    </div>

    <div>
        <?= (new Button())
            ->text('Start Process')
            ->class('btn btn-primary')
            ->addAttribute('data-spinner-start', 'true')
            ->render() ?>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const example = document.querySelector(
        '[data-example-container="spinner-javascript"]'
    );

    if (!example) {
        return;
    }

    const spinner = example.querySelector(
        '[data-redsky-component="spinner"]'
    );

    const button = example.querySelector(
        '[data-spinner-start="true"]'
    );

    const status = example.querySelector(
        '[data-spinner-status]'
    );

    if (!spinner || !button || !status) {
        return;
    }

    button.addEventListener('click', function () {
        button.disabled = true;

        status.textContent = 'Processing...';

        Spinner.show(spinner);

        setTimeout(function () {
            Spinner.hide(spinner);

            status.textContent = 'Process completed';

            button.disabled = false;
        }, 3000);
    });
});
</script>

Respeta hidden desde PHP.
Spinner.show() lo muestra.
Spinner.hide() lo oculta.
La animación CSS funciona mientras está visible.
Los tipos y tamaños quedan independientes de Bootstrap