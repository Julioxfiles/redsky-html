<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML textarea element.
 *
 * The textarea element provides a multi-line text input.
 *
 * @package RedSky\Html\Elements
 */
class TextareaElement extends HtmlElement
{
    /**
     * Creates a new textarea element.
     */
    public function __construct()
    {
        parent::__construct('textarea');
    }


    /**
     * Sets textarea name.
     *
     * @param string $name
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        $this->setAttribute(
            'name',
            $name
        );

        return $this;
    }


    /**
     * Sets textarea rows.
     *
     * @param int $rows
     *
     * @return static
     */
    public function rows(
        int $rows
    ): static {
        $this->setAttribute(
            'rows',
            $rows
        );

        return $this;
    }


    /**
     * Sets textarea columns.
     *
     * @param int $cols
     *
     * @return static
     */
    public function cols(
        int $cols
    ): static {
        $this->setAttribute(
            'cols',
            $cols
        );

        return $this;
    }


    /**
     * Sets placeholder text.
     *
     * @param string $placeholder
     *
     * @return static
     */
    public function placeholder(
        string $placeholder
    ): static {
        $this->setAttribute(
            'placeholder',
            $placeholder
        );

        return $this;
    }


    /**
     * Sets required state.
     *
     * @param bool $required
     *
     * @return static
     */
    public function required(
        bool $required = true
    ): static {
        $this->setAttribute(
            'required',
            $required
        );

        return $this;
    }
}