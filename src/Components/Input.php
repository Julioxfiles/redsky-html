<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents an HTML input component.
 *
 * The input component generates a semantic HTML
 * input element for user data entry.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components
 */
class Input extends HtmlComponent
{
    /**
     * Creates a new input component.
     *
     * @param string $type Input type.
     */
    public function __construct(
        string $type = 'text'
    ) {
        parent::__construct('input');

        $this->selfClosing = true;

        $this->type($type);
    }


    /**
     * Sets input type.
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        $this->attribute(
            'type',
            $type
        );

        return $this;
    }


    /**
     * Sets input name.
     *
     * @param string $name
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        $this->attribute(
            'name',
            $name
        );

        return $this;
    }


    /**
     * Sets input value.
     *
     * @param mixed $value
     *
     * @return static
     */
    public function value(
        mixed $value
    ): static {
        $this->attribute(
            'value',
            $value
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
        $this->attribute(
            'placeholder',
            $placeholder
        );

        return $this;
    }


    /**
     * Marks input as required.
     *
     * @param bool $required
     *
     * @return static
     */
    public function required(
        bool $required = true
    ): static {
        $this->attribute(
            'required',
            $required
        );

        return $this;
    }


    /**
     * Sets readonly state.
     *
     * @param bool $readonly
     *
     * @return static
     */
    public function readonly(
        bool $readonly = true
    ): static {
        $this->attribute(
            'readonly',
            $readonly
        );

        return $this;
    }
}