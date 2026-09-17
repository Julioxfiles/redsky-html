<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\SwitchInput;

use RedSky\Html\Components\Form\Input\Input;

/**
 * The SwitchInput component generates a checkbox input
 * presented visually as a switch control.
 *
 * The component represents a boolean value and uses the
 * native HTML checkbox input for form submission and
 * accessibility.
 *
 * Styling is handled by the component CSS resource.
 */
class SwitchInput extends Input
{
    /**
     * Creates a SwitchInput component.
     *
     * @param string|null $name The input name.
     */
    public function __construct(?string $name = null)
    {
        parent::__construct('checkbox');

        $this->class('form-switch');

        if ($name !== null) {
            $this->attribute('name', $name);
        }

        $this->attribute('role', 'switch');
    }

    /**
     * Sets the checked state of the switch.
     *
     * @param bool $checked Whether the switch is checked.
     *
     * @return static
     */
    public function checked(bool $checked = true): static
    {
        if ($checked) {
            $this->attribute('checked', 'checked');
        } else {
            $this->removeAttribute('checked');
        }

        return $this;
    }

    /**
     * Sets the disabled state of the switch.
     *
     * @param bool $disabled Whether the switch is disabled.
     *
     * @return static
     */
    public function disabled(bool $disabled = true): static
    {
        if ($disabled) {
            $this->attribute('disabled', 'disabled');
        } else {
            $this->removeAttribute('disabled');
        }

        return $this;
    }
}

