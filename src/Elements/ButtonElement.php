<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML button element.
 *
 * The button element creates a clickable button
 * used in forms and interactive interfaces.
 *
 * @package RedSky\Html\Elements
 */
class ButtonElement extends HtmlElement
{
    /**
     * Creates a new button element.
     */
    public function __construct()
    {
        parent::__construct('button');
    }


    /**
     * Sets button type.
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
     * Sets button name.
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
     * Sets button value.
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
     * Sets button form action.
     *
     * @param string $formAction
     *
     * @return static
     */
    public function formAction(
        string $formAction
    ): static {
        $this->setAttribute(
            'formaction',
            $formAction
        );

        return $this;
    }
}