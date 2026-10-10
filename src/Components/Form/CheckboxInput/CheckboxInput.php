<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\CheckboxInput;


use RedSky\Html\Components\Form\Input\Input;

/**
 * The CheckboxInput component generates a native HTML
 * <input type="checkbox"> element.
 *
 * CheckboxInput provides methods for controlling the checkbox
 * state, including checked and indeterminate states.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class CheckboxInput extends Input
{
    /**
     * Creates a new checkbox component.
     */
   public function __construct(
        ?string $name = null
    )
    {
        parent::__construct(
            'checkbox',
            $name
        );

        $this->addAttribute('data-component', 'checkbox-input');
    }

    /**
     * Marks the checkbox as checked.
     *
     * @param bool $checked
     *
     * @return static
     */
  public function checked(
    bool $checked = true
    ): static {
        $this->addAttribute(
            'checked',
            $checked
        );

        return $this;
    }

    /**
     * Removes checked state.
     *
     * @return static
     */
    public function unchecked(): static
    {
        $this->addAttribute(
            'checked',
            false
        );

        return $this;
    }

    /**
     * Sets indeterminate state.
     *
     * @param bool $indeterminate
     *
     * @return static
     */
    public function indeterminate(
        bool $indeterminate = true
    ): static {
        $this->addAttribute(
            'indeterminate',
            $indeterminate
        );

        return $this;
    }

    
}