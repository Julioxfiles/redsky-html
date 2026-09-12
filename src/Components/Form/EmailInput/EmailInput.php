<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\EmailInput;

use RedSky\Html\Components\Form\Input\Input;

/**
 * The EmailInput component generates a native HTML
 * <input type="email"> element that allows users to
 * enter an email address.
 *
 * The browser can provide built-in validation for the
 * email format when the containing form is submitted.
 *
 * Component methods support fluent method chaining.
 *
 * @package RedSky\Html\Components\Form
 */
class EmailInput extends Input
{
    /**
     * Creates a new email input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'email',
            $name
        );
    }
}