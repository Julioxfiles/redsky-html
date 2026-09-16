<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\TextInput;

use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML text input component.
 *
 * The TextInput component generates a semantic HTML
 * <input type="text"> element for single-line text input.
 *
 * The input type is automatically set to `text`.
 *
 * TextInput inherits the common input functionality provided
 * by Input, including value, placeholder, classes, styles,
 * attributes, and other input configuration methods.
 */
class TextInput extends Input
{
    /**
     * Creates a new text input component.
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