<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Interactive\Button;

use RedSky\Html\Metadata\Example;

/**
 * The Form component generates a semantic HTML
 * <form> element used to contain and submit form controls.
 *
 * The component is UI-library agnostic and does not apply
 * any default CSS classes or styles.
 *
 * Form provides convenient methods for configuring the
 * form behavior and its relationship with the server,
 * including:
 *
 * - Setting the form action URL.
 * - Setting the HTTP submission method.
 * - Setting the form encoding type.
 * - Enabling or disabling browser validation.
 * - Setting the form target.
 * - Setting the autocomplete behavior.
 * - Setting the form name.
 * - Setting the accepted character encoding.
 * - Adding individual form controls.
 * - Adding multiple form controls.
 * - Adding a submit button.
 * - Adding a reset button.
 * - Clearing all form controls.
 *
 * The addSubmitButton() and addResetButton() methods
 * automatically create the corresponding Button component
 * and add it to the form.
 *
 * Form supports fluent method chaining, allowing multiple
 * configuration methods and controls to be combined before
 * the form is rendered.
 *
 * Calling render() returns the generated HTML as a string.
 * The component can also be converted directly to a string
 * through HtmlComponent::__toString().
 *
 * Example:
 *
 * ```php
 * echo (new Form())
 *     ->action('/users')
 *     ->method('post')
 *     ->class('user-form')
 *     ->attribute('id', 'user-form')
 *     ->addSubmitButton('Save User')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <form action="/users"
 *       method="POST"
 *       class="user-form"
 *       id="user-form">
 *     <button type="submit">Save User</button>
 * </form>
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete form',
    code: <<<'PHP'
echo (new Form())
    ->action('/users')
    ->method('post')
    ->class('user-form')
    ->attribute('id', 'user-form')
    ->addSubmitButton('Save User')
    ->render();
PHP,
    description: 'The Form component generates a semantic HTML
                 <form> element and provides convenient methods
                 for configuring submission behavior and adding
                 form controls and buttons.',
    language: 'php',
    primary: true,
    output: '<form action="/users" method="POST" class="user-form" id="user-form"><button type="submit">Save User</button></form>'
)]

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