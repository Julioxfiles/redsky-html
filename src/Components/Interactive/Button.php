<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML button component.
 *
 * The button component generates a semantic HTML
 * button element.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * UI frameworks such as Bootstrap or Tailwind are
 * handled by higher level layers like redsky-ui.
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
     * Sets button text.
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
     * Sets button type.
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
     * Disables the button.
     *
     * @param bool $disabled
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
     * Sets button name.
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
     * Sets button value.
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
     * Associates button with a form.
     *
     * @param string $form
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
     * Sets form action override.
     *
     * @param string $action
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
     * Sets form encoding type override.
     *
     * @param string $enctype
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
     * Sets form method override.
     *
     * @param string $method
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
     * Disables form validation.
     *
     * @param bool $novalidate
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
     * Sets form target override.
     *
     * @param string $target
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