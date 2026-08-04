<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Interactive\Button;

/**
 * Represents an HTML form component.
 *
 * The form component generates a semantic HTML
 * form element capable of containing any
 * form-related controls.
 *
 * This component is UI-library agnostic and
 * does not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class Form extends HtmlComponent
{
    /**
     * Creates a new form component.
     */
    public function __construct()
    {
        parent::__construct('form');
    }

    /**
     * Sets the form action.
     *
     * @param string $action
     *
     * @return static
     */
    public function action(
        string $action
    ): static {
        return $this->attribute(
            'action',
            $action
        );
    }

    /**
     * Sets the HTTP method.
     *
     * @param string $method
     *
     * @return static
     */
    public function method(
        string $method
    ): static {
        return $this->attribute(
            'method',
            strtoupper($method)
        );
    }

    /**
     * Sets the form encoding type.
     *
     * @param string $enctype
     *
     * @return static
     */
    public function enctype(
        string $enctype
    ): static {
        return $this->attribute(
            'enctype',
            $enctype
        );
    }

    /**
     * Enables or disables browser validation.
     *
     * @param bool $enabled
     *
     * @return static
     */
    public function novalidate(
        bool $enabled = true
    ): static {
        return $this->attribute(
            'novalidate',
            $enabled
        );
    }

    /**
     * Sets the form target.
     *
     * @param string $target
     *
     * @return static
     */
    public function target(
        string $target
    ): static {
        return $this->attribute(
            'target',
            $target
        );
    }

    /**
     * Sets the autocomplete behavior.
     *
     * @param string $value
     *
     * @return static
     */
    public function autocomplete(
        string $value
    ): static {
        return $this->attribute(
            'autocomplete',
            $value
        );
    }

    /**
     * Adds a submit button.
     *
     * @param string $text
     *
     * @return static
     */
    public function addSubmitButton(
        string $text = 'Submit'
    ): static {
        $this->addChild(
            (new Button())
                ->type('submit')
                ->text($text)
        );

        return $this;
    }

    /**
     * Adds a reset button.
     *
     * @param string $text
     *
     * @return static
     */
    public function addResetButton(
        string $text = 'Reset'
    ): static {
        $this->addChild(
            (new Button())
                ->type('reset')
                ->text($text)
        );

        return $this;
    }

        /**
     * Sets the form name.
     *
     * @param string $name
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        return $this->attribute(
            'name',
            $name
        );
    }


    /**
     * Sets the form autocomplete state.
     *
     * @param bool $enabled
     *
     * @return static
     */
    public function autocompleteOff(
        bool $enabled = true
    ): static {
        return $this->attribute(
            'autocomplete',
            $enabled ? 'off' : 'on'
        );
    }


    /**
     * Sets the accept charset.
     *
     * @param string $charset
     *
     * @return static
     */
    public function acceptCharset(
        string $charset
    ): static {
        return $this->attribute(
            'accept-charset',
            $charset
        );
    }


    /**
     * Sets form relation.
     *
     * @param string $name
     *
     * @return static
     */
    public function nameAttribute(
        string $name
    ): static {
        return $this->attribute(
            'name',
            $name
        );
    }


    /**
     * Clears form children.
     *
     * @return static
     */
    public function clearControls(): static
    {
        return $this->clearChildren();
    }


    /**
     * Adds a form control.
     *
     * @param mixed $control
     *
     * @return static
     */
    public function addControl(
        mixed $control
    ): static {
        return $this->addChild(
            $control
        );
    }


    /**
     * Adds multiple form controls.
     *
     * @param array<int, mixed> $controls
     *
     * @return static
     */
    public function addControls(
        array $controls
    ): static {
        return $this->addChildren(
            $controls
        );
    }
}