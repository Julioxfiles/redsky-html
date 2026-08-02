<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents an HTML option component.
 *
 * The option component generates a semantic HTML
 * option element used inside select components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components
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
     * Sets option text.
     *
     * @param string $text
     *
     * @return static
     */
    public function text(
        string $text
    ): static {
        $this->setContent($text);

        return $this;
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
}