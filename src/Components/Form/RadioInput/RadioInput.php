<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\RadioInput;

use RedSky\Html\Metadata\Example;
use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML radio button component.
 *
 * The RadioInput component generates a native HTML
 * <input type="radio"> element.
 *
 * Radio buttons are normally used as a group of related
 * options where the user can select only one option.
 * Radio buttons belonging to the same group should share
 * the same name attribute.
 *
 * A value can be assigned using the inherited value()
 * method and the selected state can be controlled using
 * checked() or unchecked().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * Because RadioInput extends the standard input component,
 * it also supports the common component methods for setting
 * HTML attributes, CSS classes, inline styles, values,
 * and other input properties.
 *
 * Component methods support fluent method chaining, allowing
 * multiple configuration methods to be combined before the
 * component is rendered.
 *
 * Calling render() returns the generated HTML as a string.
 * The component can also be converted directly to a string
 * through HtmlComponent::__toString().
 *
 * Example:
 *
 * ```php
 * echo new RadioInput('payment')
 *     ->value('card')
 *     ->checked()
 *     ->attribute('id', 'payment-card')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="radio"
 *        name="payment"
 *        value="card"
 *        checked
 *        id="payment-card" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete radio input',
    code: <<<'PHP'
    echo new RadioInput('payment')
        ->value('card')
        ->checked()
        ->attribute('id', 'payment-card')
        ->render();
    PHP,
    description: 'The RadioInput component generates a native HTML
                 <input type="radio"> element with a value and
                 checked state.',
    language: 'php',
    primary: true,
    output: '<input type="radio" name="payment" value="card" checked id="payment-card" />'
)]
class RadioInput extends Input
{
    /**
     * Creates a new radio input component.
     *
     * The input type is automatically set to "radio".
     *
     * @param string|null $name Input name used to associate
     *                          the radio button with a group.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'radio',
            $name
        );
    }


    /**
     * Marks the radio button as checked.
     *
     * When enabled, the checked attribute is added to
     * the generated input element.
     *
     * @param bool $checked Whether the radio button is checked.
     *
     * @return static
     */
    public function checked(
        bool $checked = true
    ): static {
        $this->attribute(
            'checked',
            $checked
        );

        return $this;
    }


    /**
     * Removes the checked state from the radio button.
     *
     * This sets the checked attribute to false so the
     * radio button is not rendered as selected.
     *
     * @return static
     */
    public function unchecked(): static
    {
        $this->attribute(
            'checked',
            false
        );

        return $this;
    }
}