<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML optgroup element.
 *
 * The optgroup element groups related options
 * inside a select element.
 *
 * @package RedSky\Html\Elements
 */
class OptGroupElement extends HtmlElement
{
    /**
     * Creates a new optgroup element.
     */
    public function __construct()
    {
        parent::__construct('optgroup');
    }


    /**
     * Sets option group label.
     *
     * @param string $label
     *
     * @return static
     */
    public function label(
        string $label
    ): static {
        $this->setAttribute(
            'label',
            $label
        );

        return $this;
    }


    /**
     * Disables the option group.
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