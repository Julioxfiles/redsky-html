<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML input element.
 *
 * The input element is used to create interactive
 * controls for forms.
 *
 * @package RedSky\Html\Elements
 */
class InputElement extends HtmlElement
{
    /**
     * Creates a new input element.
     */
    public function __construct()
    {
        parent::__construct('input');
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
        $this->setAttribute(
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
        $this->setAttribute(
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
        $this->setAttribute(
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


    /**
     * Renders input element.
     *
     * Input is an HTML void element.
     *
     * @return string
     */
    public function render(): string
    {
        $html = '<' . $this->tag;

        if ($this->attributes()->canRenderAttributes()) {
            $html .= ' ' . $this->attributes()->renderAttributes();
        }

        $html .= '>';

        return $html;
    }
}