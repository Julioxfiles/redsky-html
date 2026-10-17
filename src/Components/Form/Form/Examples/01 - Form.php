<?php
declare(strict_types=1);

use RedSky\Html\Components\Form\Form\Form;

/**
 * Form component usage example.
 *
 * Demonstrates form configuration and submit button creation.
 *
 * @package RedSky\Html\Components\Form\Form
 */

$form = (new Form())
    ->action('/register')
    ->method('post')
    ->autocomplete('on')
    ->addSubmitButton('Crear cuenta');

echo $form->render();