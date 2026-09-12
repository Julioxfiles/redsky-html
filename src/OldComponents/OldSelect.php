<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML select component.
 *
 * The Select component generates a semantic HTML
 * <select> element used to provide one or more
 * selectable options.
 *
 * Options can be added individually using addOption()
 * or in bulk using addOptions(). The option() and options()
 * methods provide convenient aliases for these methods.
 *
 * Select supports both single-selection and multiple-selection
 * controls, as well as required, disabled, and visible option
 * count configurations.
 *
 * Options are represented by Option components and are added
 * as child components of the Select element.
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
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
 * echo new Select()
 *     ->name('country')
 *     ->required()
 *     ->addOptions([
 *         'Mexico' => 'mx',
 *         'United States' => 'us',
 *         'Canada' => 'ca',
 *     ])
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <select name="country" required>
 *     <option value="mx">Mexico</option>
 *     <option value="us">United States</option>
 *     <option value="ca">Canada</option>
 * </select>
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete select',
    code: <<<'PHP'
    echo new Select()
        ->name('country')
        ->required()
        ->addOptions([
            'Mexico' => 'mx',
            'United States' => 'us',
            'Canada' => 'ca',
        ])
        ->render();
    PHP,
    description: 'The Select component generates a semantic HTML
                 <select> element with multiple selectable options
                 and form configuration.',
    language: 'php',
    primary: true,
    output: '<select name="country" required><option value="mx">Mexico</option><option value="us">United States</option><option value="ca">Canada</option></select>'
)]
class Select extends HtmlComponent
{
    /**
     * Creates a new select component.
     */
    public function __construct()
    {
        parent::__construct('select');
    }


    /**
     * Sets the select name.
     *
     * The name identifies the submitted value when the
     * containing form is submitted.
     *
     * @param string $name Select name.
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
     * Enables or disables multiple selection.
     *
     * When enabled, the user can select multiple options
     * from the select control.
     *
     * @param bool $multiple Whether multiple selection is enabled.
     *
     * @return static
     */
    public function multiple(
        bool $multiple = true
    ): static {
        return $this->attribute(
            'multiple',
            $multiple
        );
    }


    /**
     * Marks the select as required.
     *
     * A required select must have a valid option selected
     * before the containing form can be submitted.
     *
     * @param bool $required Whether the select is required.
     *
     * @return static
     */
    public function required(
        bool $required = true
    ): static {
        return $this->attribute(
            'required',
            $required
        );
    }


    /**
     * Adds a single option.
     *
     * The option is created as an Option component and
     * added as a child of the select element.
     *
     * @param string $text Visible option text.
     * @param mixed $value Submitted option value.
     *
     * @return static
     */
    public function addOption(
        string $text,
        mixed $value
    ): static {
        $this->addChild(
            new Option(
                $text,
                $value
            )
        );

        return $this;
    }


    /**
     * Adds multiple options from an associative array.
     *
     * The array key is used as the visible option text
     * and the array value is used as the submitted option value.
     *
     * Example:
     *
     *     [
     *         'Mexico' => 'mx',
     *         'Canada' => 'ca',
     *     ]
     *
     * @param array<string, mixed> $options Options indexed by text.
     *
     * @return static
     */
    public function addOptions(
        array $options
    ): static {
        foreach ($options as $text => $value) {
            $this->addOption(
                $text,
                $value
            );
        }

        return $this;
    }


    /**
     * Sets the selected option value.
     *
     * This method is intended to define the value that should
     * be selected when the select is rendered.
     *
     * @param mixed $value Selected option value.
     *
     * @return static
     */
    public function selected(
        mixed $value
    ): static {
        return $this->attribute(
            'value',
            $value
        );
    }


    /**
     * Adds a single option.
     *
     * Alias of addOption().
     *
     * @param string $text Visible option text.
     * @param mixed $value Submitted option value.
     *
     * @return static
     */
    public function option(
        string $text,
        mixed $value
    ): static {
        return $this->addOption(
            $text,
            $value
        );
    }


    /**
     * Adds multiple options.
     *
     * Alias of addOptions().
     *
     * @param array<string, mixed> $options Options indexed by text.
     *
     * @return static
     */
    public function options(
        array $options
    ): static {
        return $this->addOptions(
            $options
        );
    }


    /**
     * Sets the disabled state.
     *
     * A disabled select cannot be interacted with by the user
     * and its value is not submitted with the form.
     *
     * @param bool $disabled Whether the select is disabled.
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        return $this->attribute(
            'disabled',
            $disabled
        );
    }


    /**
     * Sets the number of visible options.
     *
     * The value is assigned to the native HTML size attribute.
     *
     * @param int $size Number of visible options.
     *
     * @return static
     */
    public function size(
        int $size
    ): static {
        return $this->attribute(
            'size',
            $size
        );
    }
}