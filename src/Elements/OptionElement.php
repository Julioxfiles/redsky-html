<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML option element.
 *
 * The option element defines an item inside
 * a select dropdown.
 *
 * @package RedSky\Html\Elements
 */
class OptionElement extends HtmlElement
{
    /**
     * Creates a new option element.
     *
     * @param string|null $text
     * @param mixed $value
     */
    public function __construct(
        ?string $text = null,
        mixed $value = null
    ) {
        parent::__construct('option');

        if ($text !== null) {
            $this->content($text);
        }

        if ($value !== null) {
            $this->value($value);
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
        $this->setAttribute(
            'value',
            $value
        );

        return $this;
    }


    /**
     * Sets selected state.
     *
     * @param bool $selected
     *
     * @return static
     */
    public function selected(
        bool $selected = true
    ): static {
        $this->setAttribute(
            'selected',
            $selected
        );

        return $this;
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
        $this->setAttribute(
            'disabled',
            $disabled
        );

        return $this;
    }
}