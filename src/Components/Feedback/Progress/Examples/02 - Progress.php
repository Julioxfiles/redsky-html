<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Progress\Progress;
use RedSky\Html\Components\Interactive\Button\Button;
?>

<!--
    This example requires its own container because the documentation
    page may render multiple Progress components at the same time.
    JavaScript queries must remain scoped to this container.
-->
<div data-example-container="progress-javascript">

    <div class="mb-3">
        <h3>Progress with JavaScript</h3>
        <p>
            Start a simulated process and watch the progress indicator
            update automatically.
        </p>
    </div>

    <div class="mb-3">
        <?= (new Progress())
            ->value(0)
            ->type('primary')
            ->label('0% complete')
            ->render() ?>
    </div>

    <div class="mb-3">
        <strong data-progress-status>Ready to start</strong>
    </div>

    <div class="mb-4">
        <?= (new Button())
            ->text('Start Process')
            ->class('btn btn-primary')
            ->addAttribute('data-progress-start', 'true')
            ->render() ?>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const example = document.querySelector(
        '[data-example-container="progress-javascript"]'
    );

    if (!example) {
        return;
    }

    const progress = example.querySelector(
        '[data-redsky-component="progress"]'
    );

    const button = example.querySelector(
        '[data-progress-start="true"]'
    );

    const status = example.querySelector(
        '[data-progress-status]'
    );

    if (!progress || !button || !status) {
        return;
    }

    button.addEventListener('click', function () {
        let value = 0;

        button.disabled = true;

        Progress.reset(progress);

        status.textContent = 'Processing...';

        progress.setAttribute(
            'aria-label',
            '0% complete'
        );

        const interval = setInterval(function () {
            value += 5;

            Progress.setValue(progress, value);

            status.textContent = value + '% complete';

            progress.setAttribute(
                'aria-label',
                value + '% complete'
            );

            if (value === 100) {
                clearInterval(interval);

                status.textContent = 'Process completed';

                progress.setAttribute(
                    'aria-label',
                    'Process completed'
                );

                button.disabled = false;
            }
        }, 250);
    });
});
</script>


<!--
<div data-example-container="progress-javascript">

    Progress 

    Status

    Button 
    
</div>
-->

// El Button debe quedarse dentro de ese contenedor, claro puede tener cualquier otro nombre 
// data-example-container tampoco tiene que tener ese nombre obligatoriamente. 