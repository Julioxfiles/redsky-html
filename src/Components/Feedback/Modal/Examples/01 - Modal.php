<?php

declare(strict_types=1);

use RedSky\Html\Components\Feedback\Modal\Modal;
use RedSky\Html\Components\Interactive\Button\Button;
use RedSky\Html\Components\Layout\Div\Div;

$openModalButton = (new Button())
    ->text('Abrir Modal')
    ->class('btn btn-primary')
    ->size('small')
    ->attribute('data-modal-target', '#example-modal');

$modalBody = (new Div())
    ->style('height', '300px')
    ->style('display', 'flex')
    ->style('align-items', 'center')
    ->style('justify-content', 'center')
    ->setContent('Aquí va el formulario');

$modal = (new Modal())
    ->attribute('id', 'example-modal')
    ->title('User Information')
    ->description('This modal is large enough for a future form.')
    ->size('large')
    ->body($modalBody)
    ->footer(
        (new Button())
            ->text('Cancelar')
    )
    ->footer(
        (new Button())
            ->text('Aceptar')
    );

echo $openModalButton;
echo $modal;