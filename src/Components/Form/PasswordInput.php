<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML password input component.
 *
 * The password input component generates
 * an input element with type="password".
 *
 * @package RedSky\Html\Components\Form
 */
class PasswordInput extends Input
{
    /**
     * Creates a new password input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'password',
            $name
        );
    }
}