<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

/**
 * The ColorInput component generates a native HTML
 * <input type="color"> element that allows users to
 * select a color.
 *
 * The selected color is submitted by the browser as a
 * hexadecimal color value.
 *
 * ColorInput provides convenient methods for setting
 * the selected color, including:
 *
 * - Setting a custom hexadecimal color value.
 * - Setting the color to black.
 * - Setting the color to white.
 * - Setting the color to red.
 * - Setting the color to green.
 * - Setting the color to blue.
 *
 * Because ColorInput extends the standard input component,
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
 * echo new ColorInput('color')
 *     ->class('color-picker')
 *     ->style('accent-color:cornflowerblue')
 *     ->attribute('id', 'color-input')
 *     ->blue()
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="color"
 *        name="color"
 *        class="color-picker"
 *        style="accent-color:cornflowerblue"
 *        id="color-input"
 *        value="#0000ff" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete color input',
    code: <<<'PHP'
    echo new ColorInput('color')
        ->class('color-picker')
        ->style('accent-color:cornflowerblue')
        ->attribute('id', 'color-input')
        ->blue()
        ->render();
    PHP,
    description: 'The ColorInput component generates a native HTML
                 <input type="color"> element and provides
                 convenient methods for setting custom or
                 predefined hexadecimal color values.',
    language: 'php',
    primary: true,
    output: '<input type="color" name="color" class="color-picker" style="accent-color:cornflowerblue" id="color-input" value="#0000ff" />'
)]
class ColorInput extends Input
{
    /**
     * Creates a new color input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'color',
            $name
        );
    }

        /**
     * Sets hexadecimal color value.
     *
     * @param string $color
     *
     * @return static
     */
    public function color(
        string $color
    ): static {
        $this->value($color);

        return $this;
    }


    /**
     * Sets black color.
     *
     * @return static
     */
    public function black(): static
    {
        return $this->color('#000000');
    }


    /**
     * Sets white color.
     *
     * @return static
     */
    public function white(): static
    {
        return $this->color('#ffffff');
    }


    /**
     * Sets red color.
     *
     * @return static
     */
    public function red(): static
    {
        return $this->color('#ff0000');
    }


    /**
     * Sets green color.
     *
     * @return static
     */
    public function green(): static
    {
        return $this->color('#00ff00');
    }


    /**
     * Sets blue color.
     *
     * @return static
     */
    public function blue(): static
    {
        return $this->color('#0000ff');
    }
}