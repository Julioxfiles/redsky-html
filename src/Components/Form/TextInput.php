<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML text input component.
 *
 * The text input component generates
 * an input element with type="text".
 *
 * @package RedSky\Html\Components\Form
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