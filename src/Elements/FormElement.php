<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML form element.
 *
 * The form element is used to collect and submit
 * user input.
 *
 * @package RedSky\Html\Elements
 */
class FormElement extends HtmlElement
{
    /**
     * Creates a new form element.
     */
    public function __construct()
    {
        parent::__construct('form');
    }


    /**
     * Sets form action URL.
     *
     * @param string $action
     *
     * @return static
     */
    public function action(
        string $action
    ): static {
        $this->setAttribute(
            'action',
            $action
        );

        return $this;
    }


    /**
     * Sets form HTTP method.
     *
     * @param string $method
     *
     * @return static
     */
    public function method(
        string $method
    ): static {
        $this->setAttribute(
            'method',
            strtoupper($method)
        );

        return $this;
    }


    /**
     * Sets form encoding type.
     *
     * @param string $enctype
     *
     * @return static
     */
    public function enctype(
        string $enctype
    ): static {
        $this->setAttribute(
            'enctype',
            $enctype
        );

        return $this;
    }


    /**
     * Sets autocomplete behavior.
     *
     * @param string $value
     *
     * @return static
     */
    public function autocomplete(
        string $value
    ): static {
        $this->setAttribute(
            'autocomplete',
            $value
        );

        return $this;
    }


    /**
     * Sets novalidate state.
     *
     * @param bool $enabled
     *
     * @return static
     */
    public function novalidate(
        bool $enabled = true
    ): static {
        $this->setAttribute(
            'novalidate',
            $enabled
        );

        return $this;
    }
}