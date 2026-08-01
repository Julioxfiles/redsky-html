<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML select element.
 *
 * The select element creates a dropdown list of options.
 *
 * @package RedSky\Html\Elements
 */
class SelectElement extends HtmlElement
{
    /**
     * Creates a new select element.
     */
    public function __construct()
    {
        parent::__construct('select');
    }


    /**
     * Sets select name.
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
     * Sets select id.
     *
     * @param string $id
     *
     * @return static
     */
    public function id(
        string $id
    ): static {
        $this->setAttribute(
            'id',
            $id
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
     * Sets multiple selection.
     *
     * @param bool $multiple
     *
     * @return static
     */
    public function multiple(
        bool $multiple = true
    ): static {
        $this->setAttribute(
            'multiple',
            $multiple
        );

        return $this;
    }
}