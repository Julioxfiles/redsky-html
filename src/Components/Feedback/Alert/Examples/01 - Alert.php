<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Alert\Alert;

echo (new Alert())
    ->type('info')
    ->title('Information')
    ->message('This is an informational alert.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('success')
    ->message('The operation was completed successfully.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('warning')
    ->title('Warning')
    ->message('Please review the information before continuing.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('danger')
    ->title('Error')
    ->message('An error occurred while processing the request.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('dark')
    ->title('Success')
    ->message('Your changes have been saved successfully.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('light')
    ->title('Warning')
    ->message('This action may affect existing data.')
    ->dismissible()
    ->render();

