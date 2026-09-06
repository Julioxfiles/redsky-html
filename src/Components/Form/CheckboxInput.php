<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

/**
 * The CheckboxInput component generates a native HTML
 * <input type="checkbox"> element that allows users to
 * select or deselect an option.
 *
 * The component is UI-library agnostic and does not apply
 * any default CSS classes or styles.
 *
 * A name can optionally be supplied to identify the value
 * when the containing form is submitted.
 *
 * CheckboxInput provides convenient methods for controlling
 * the checkbox state, including:
 *
 * - Marking the checkbox as checked.
 * - Removing the checked state.
 * - Setting the checkbox to an indeterminate state.
 *
 * Because CheckboxInput extends the standard input component,
 * it also supports the common component methods for setting
 * HTML attributes, CSS classes, inline styles, and other
 * component properties.
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
 * echo new CheckboxInput('terms')
 *     ->class('checkbox')
 *     ->style('accent-color:cornflowerblue')
 *     ->attribute('id', 'terms')
 *     ->checked()
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="checkbox"
 *        name="terms"
 *        class="checkbox"
 *        style="accent-color:cornflowerblue"
 *        id="terms"
 *        checked />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete checkbox input',
    code: <<<'PHP'
    echo new CheckboxInput('terms')
        ->class('checkbox')
        ->style('accent-color:cornflowerblue')
        ->attribute('id', 'terms')
        ->checked()
        ->render();
    PHP,
    description: 'The CheckboxInput component generates a native HTML
                 <input type="checkbox"> element and provides
                 convenient methods for controlling its checked
                 and indeterminate states.',
    language: 'php',
    primary: true,
    output: '<input type="checkbox" name="terms" class="checkbox" style="accent-color:cornflowerblue" id="terms" checked />'
)]
class CheckboxInput extends Input
{
    /**
     * Creates a new checkbox component.
     */
   public function __construct(
        ?string $name = null
    )
    {
        parent::__construct(
            'checkbox',
            $name
        );
    }

    /**
     * Marks the checkbox as checked.
     *
     * @param bool $checked
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
     * Removes checked state.
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

    /**
     * Sets indeterminate state.
     *
     * @param bool $indeterminate
     *
     * @return static
     */
    public function indeterminate(
        bool $indeterminate = true
    ): static {
        $this->attribute(
            'indeterminate',
            $indeterminate
        );

        return $this;
    }

    
}