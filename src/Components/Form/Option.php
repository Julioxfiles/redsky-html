<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML option component.
 *
 * The option component generates a semantic HTML
 * option element used inside select components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class Option extends HtmlComponent
{
    /**
     * Creates a new option component.
     *
     * @param string|null $text Option text.
     * @param mixed|null $value Option value.
     */
    public function __construct(
        ?string $text = null,
        mixed $value = null
    ) {
        parent::__construct('option');

        if ($value !== null) {
            $this->value($value);
        }

        if ($text !== null) {
            $this->text($text);
        }
    }

    /**
     * Sets option value.
     *
     * @param mixed $value
     *
     * @return static
     */
    public function value(
        mixed $value
    ): static {
        return $this->attribute(
            'value',
            $value
        );
    }


    /**
     * Marks option as selected.
     *
     * @param bool $selected
     *
     * @return static
     */
    public function selected(
        bool $selected = true
    ): static {
        return $this->attribute(
            'selected',
            $selected
        );
    }

    /**
     * Sets disabled state.
     *
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        return $this->attribute(
            'disabled',
            $disabled
        );
    }


    /**
     * Sets option label.
     *
     * @param string $label
     *
     * @return static
     */
    public function label(
        string $label
    ): static {
        return $this->attribute(
            'label',
            $label
        );
    }
}