<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML hidden input component.
 *
 * The hidden input component generates a semantic
 * HTML input element with type="hidden".
 *
 * Hidden inputs are commonly used to submit values
 * that should not be visible or editable by users.
 *
 * This component is UI-library agnostic and
 * does not apply any default classes or styles.
 *
 * @example
 * $input = (new HiddenInput())
 *     ->name('user_id')
 *     ->value('42');
 *
 * echo $input->render();
 *
 * // <input type="hidden" name="user_id" value="42">
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Hidden input',
    code: <<<'PHP'
    echo new HiddenInput()
        ->name('user_id')
        ->value('42')
        ->attribute('id', 'user-id')
        ->render();
    PHP,
    description: 'The HiddenInput component generates a native HTML
                 <input type="hidden"> element for submitting
                 values that should not be visible or editable.',
    language: 'php',
    primary: true,
    output: '<input type="hidden" name="user_id" value="42" id="user-id" />'
)]
class HiddenInput extends Input
{
    /**
     * Creates a new hidden input component.
     */
    public function __construct()
    {
        parent::__construct();

        $this->type('hidden');
    }
}