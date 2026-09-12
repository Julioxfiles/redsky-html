<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\RadioInput;


use RedSky\Html\Components\Form\Input\Input;

/**
 * The RadioInput component generates a native HTML
 * <input type="radio"> element.
 *
 * Radio buttons are normally grouped by sharing the same
 * name attribute, allowing the user to select one option.
 *
 * The value and selected state can be configured using
 * the inherited value() and checked() methods.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class RadioInput extends Input
{
    /**
     * Creates a new radio input component.
     *
     * The input type is automatically set to "radio".
     *
     * @param string|null $name Input name used to associate
     *                          the radio button with a group.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'radio',
            $name
        );
    }


    /**
     * Marks the radio button as checked.
     *
     * When enabled, the checked attribute is added to
     * the generated input element.
     *
     * @param bool $checked Whether the radio button is checked.
     *
     * @return static
     */
    public function checked(
        bool $checked = true
    ): static {
        $this->attribute(
            'checked',
            $checked
        );

        return $this;
    }


    /**
     * Removes the checked state from the radio button.
     *
     * This sets the checked attribute to false so the
     * radio button is not rendered as selected.
     *
     * @return static
     */
    public function unchecked(): static
    {
        $this->attribute(
            'checked',
            false
        );

        return $this;
    }
}