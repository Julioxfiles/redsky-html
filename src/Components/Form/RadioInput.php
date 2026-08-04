<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML radio button component.
 *
 * The radio component generates a semantic
 * HTML input element with type="radio".
 *
 * This component is UI-library agnostic and
 * does not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class RadioInput extends Input
{
    /**
     * Creates a new radio component.
     */
    public function __construct(
        ?string $name = null
    )
    {
        parent::__construct(
            'radio',
            $name
        );
    }

    /**
     * Marks the radio button as checked.
     *
     * @param bool $checked
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
     * Removes checked state.
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