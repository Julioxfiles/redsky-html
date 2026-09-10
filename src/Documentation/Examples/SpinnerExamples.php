<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Metadata\Example;

#[Example(
        title: 'Bootstrap Spinner',
        description: 'A RedSky circular spinner integrated with Bootstrap utility classes.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Feedback\Spinner;

$spinner = new Spinner();

$spinner
    ->type('primary')
    ->size('medium')
    ->label('Loading customers...')
    ->class('text-primary');

echo $spinner;
PHP,
        output: <<<'HTML'
<span
    data-redsky-component="spinner"
    data-spinner-type="primary"
    data-spinner-size="medium"
    class="text-primary"
    role="status"
    aria-label="Loading customers..."
>
    <span
        data-spinner-indicator
        aria-hidden="true"
    ></span>
</span>
HTML
    )]
    #[Example(
        title: 'Materialize Spinner',
        description: 'A RedSky circular spinner integrated with Materialize color utilities.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Feedback\Spinner;

$spinner = new Spinner();

$spinner
    ->type('success')
    ->size('large')
    ->label('Saving customer...')
    ->class('green-text');

echo $spinner;
PHP,
        output: <<<'HTML'
<span
    data-redsky-component="spinner"
    data-spinner-type="success"
    data-spinner-size="large"
    class="green-text"
    role="status"
    aria-label="Saving customer..."
>
    <span
        data-spinner-indicator
        aria-hidden="true"
    ></span>
</span>
HTML
    )]
#[Example(
    title: 'JavaScript Visibility Control',
    description: 'Use the RedSky Spinner JavaScript API to show a spinner while an asynchronous operation is in progress and hide it when the operation completes. The spinner can be styled with Bootstrap or Materialize CSS classes without changing the JavaScript API.',
    language: 'javascript',
    code: <<<'JAVASCRIPT'
const spinner = document.querySelector(
    '[data-redsky-component="spinner"]'
);

// Show the spinner while the operation is running.
Spinner.show(spinner);

fetch('/api/customers', {
    method: 'POST',
    body: formData
})
    .then(response => response.json())
    .then(data => {
        // Customer saved successfully.
    })
    .catch(error => {
        // Handle the error.
    })
    .finally(() => {
        // Hide the spinner when the operation finishes.
        Spinner.hide(spinner);
    });
JAVASCRIPT
)]
final class SpinnerExamples
{
}