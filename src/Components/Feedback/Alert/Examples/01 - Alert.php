<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Alert\Alert;

echo (new Alert())
    ->type('info')
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
    ->message('Please review the information before continuing.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('danger')
    ->message('An error occurred while processing the request.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('success')
    ->title('Success')
    ->message('Your changes have been saved successfully.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('warning')
    ->title('Warning')
    ->message('This action may affect existing data.')
    ->dismissible()
    ->render();

echo (new Alert())
    ->type('danger')
    ->title('Error')
    ->message('The requested operation could not be completed.')
    ->dismissible()
    ->render();
