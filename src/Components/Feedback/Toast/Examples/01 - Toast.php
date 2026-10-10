<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Toast\Toast;

$infoToast = (new Toast())
    ->type('info')
    ->title('Information')
    ->message('Your profile information has been updated.')
    ->duration(5000);

$successToast = (new Toast())
    ->type('success')
    ->title('Changes saved')
    ->message('Your changes have been saved successfully.')
    ->duration(4000);

$warningToast = (new Toast())
    ->type('warning')
    ->title('Session expiring')
    ->message('Your session will expire soon. Save your work.')
    ->duration(7000);

$errorToast = (new Toast())
    ->type('danger')
    ->title('Request failed')
    ->message('The operation could not be completed. Please try again.')
    ->duration(0);

echo $infoToast->render();
echo $successToast->render();
echo $warningToast->render();
echo $errorToast->render();