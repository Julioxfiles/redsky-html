<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\TextInput;

use RedSky\Html\Metadata\Example;
use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML text input component.
 *
 * The TextInput component generates a semantic HTML
 * <input type="text"> element for single-line text input.
 *
 * It extends Input and inherits the common input functionality,
 * including methods for setting the value, placeholder, classes,
 * styles, attributes, and other HTML input attributes.
 *
 * The component uses fluent methods, allowing multiple
 * configuration calls to be chained together.
 *
 * TextInput is UI-library agnostic and does not apply
 * default classes or styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo new TextInput('username')
 *     ->value('john')
 *     ->placeholder('Enter your username')
 *     ->attribute('id', 'username-input')
 *     ->required()
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="text"
 *        name="username"
 *        value="john"
 *        placeholder="Enter your username"
 *        id="username-input"
 *        required />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete text input',
    code: <<<'PHP'
    echo new TextInput('username')
        ->value('john')
        ->placeholder('Enter your username')
        ->attribute('id', 'username-input')
        ->required()
        ->render();
    PHP,
    description: 'The TextInput component generates a semantic HTML
                 <input type="text"> element for single-line text
                 input and inherits the common configuration methods
                 provided by the Input component.',
    language: 'php',
    primary: true,
    output: '<input type="text" name="username" value="john" placeholder="Enter your username" id="username-input" required />'
)]
class TextInput extends Input
{
    /**
     * Creates a new text input component.
     *
     * The input type is automatically set to `text`.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'text',
            $name
        );
    }
}