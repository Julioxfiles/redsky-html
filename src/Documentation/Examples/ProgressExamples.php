<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Metadata\Example;

#[Example(
    title: 'Bootstrap Progress',
    description: 'A RedSky progress indicator integrated with Bootstrap utility classes.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Feedback\Progress;

$progress = new Progress();

$progress
    ->value(65)
    ->max(100)
    ->label('Uploading file...')
    ->class('progress-bar bg-primary');

echo $progress;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="progress"
    data-progress-value="65"
    data-progress-max="100"
    class="progress-bar bg-primary"
    role="progressbar"
    aria-valuenow="65"
    aria-valuemin="0"
    aria-valuemax="100"
    aria-label="Uploading file..."
>
    <div data-progress-indicator style="width: 65%;"></div>
</div>
HTML
)]
#[Example(
    title: 'Materialize Progress',
    description: 'A RedSky progress indicator integrated with Materialize styling.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Feedback\Progress;

$progress = new Progress();

$progress
    ->value(40)
    ->max(100)
    ->label('Processing records...')
    ->class('blue');

echo $progress;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="progress"
    data-progress-value="40"
    data-progress-max="100"
    class="blue"
    role="progressbar"
    aria-valuenow="40"
    aria-valuemin="0"
    aria-valuemax="100"
    aria-label="Processing records..."
>
    <div data-progress-indicator style="width: 40%;"></div>
</div>
HTML
)]
#[Example(
    title: 'JavaScript Progress Update',
    description: 'Use the RedSky Progress JavaScript API to update the progress value while an asynchronous operation is running.',
    language: 'javascript',
    code: <<<'JAVASCRIPT'
const progress = document.querySelector(
    '[data-redsky-component="progress"]'
);

Progress.setValue(progress, 25);

fetch('/api/import')
    .then(response => response.json())
    .then(data => {
        Progress.setValue(progress, 100);
    })
    .catch(error => {
        // Handle the error.
    });
JAVASCRIPT
)]
final class ProgressExamples
{
}