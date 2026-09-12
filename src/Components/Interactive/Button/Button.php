<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Button;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <button> element.
 *
 * The Button component generates a semantic HTML button
 * element used for user interactions and form actions.
 *
  * @package RedSky\Html\Components\Interactive
 */
class Button extends HtmlComponent
{
    /**
     * Creates a new button component.
     *
     * @param string|null $text Button text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('button');

        if ($text !== null) {
            $this->text($text);
        }
    }

    /**
     * Sets the button text.
     *
     * @param string $text Button text.
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
     * Sets the button type.
     *
     * Common values include `button`, `submit`, and `reset`.
     *
     * @param string $type Button type.
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
     * Enables or disables the button.
     *
     * @param bool $disabled Whether the button is disabled.
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        $this->attribute(
            'disabled',
            $disabled
        );

        return $this;
    }

    /**
     * Sets the button name.
     *
     * The name is submitted with the button value when the
     * button participates in form submission.
     *
     * @param string $name Button name.
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
     * Sets the button value.
     *
     * @param mixed $value Button value.
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
     * Associates the button with a form.
     *
     * Corresponds to the HTML `form` attribute.
     *
     * @param string $form ID of the associated form.
     *
     * @return static
     */
    public function form(
        string $form
    ): static {
        return $this->attribute(
            'form',
            $form
        );
    }

    /**
     * Sets the form action override.
     *
     * Corresponds to the HTML `formaction` attribute.
     *
     * @param string $action URL to submit the form to.
     *
     * @return static
     */
    public function formaction(
        string $action
    ): static {
        return $this->attribute(
            'formaction',
            $action
        );
    }

    /**
     * Sets the form encoding type override.
     *
     * Corresponds to the HTML `formenctype` attribute.
     *
     * @param string $enctype Form encoding type.
     *
     * @return static
     */
    public function formenctype(
        string $enctype
    ): static {
        return $this->attribute(
            'formenctype',
            $enctype
        );
    }

    /**
     * Sets the form submission method override.
     *
     * The supplied method is converted to uppercase before
     * being assigned to the HTML `formmethod` attribute.
     *
     * @param string $method HTTP form submission method.
     *
     * @return static
     */
    public function formmethod(
        string $method
    ): static {
        return $this->attribute(
            'formmethod',
            strtoupper($method)
        );
    }

    /**
     * Enables or disables form validation for this button.
     *
     * Corresponds to the HTML `formnovalidate` attribute.
     *
     * @param bool $novalidate Whether form validation is disabled.
     *
     * @return static
     */
    public function formnovalidate(
        bool $novalidate = true
    ): static {
        return $this->attribute(
            'formnovalidate',
            $novalidate
        );
    }

    /**
     * Sets the form target override.
     *
     * Corresponds to the HTML `formtarget` attribute.
     *
     * @param string $target Browsing context for the form response.
     *
     * @return static
     */
    public function formtarget(
        string $target
    ): static {
        return $this->attribute(
            'formtarget',
            $target
        );
    }
}