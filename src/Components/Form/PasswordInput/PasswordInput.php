<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\PasswordInput;


use RedSky\Html\Components\Form\Input\Input;

/**
 * The PasswordInput component generates a native HTML
 * <input type="password"> element for entering passwords
 * and other sensitive text values.
 *
 * The browser masks the entered characters according
 * to its native password-input behavior.
 *
 * @package RedSky\Html\Components\Form
 */
class PasswordInput extends Input
{
    /**
     * Creates a new password input component.
     *
     * The input type is automatically set to "password".
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