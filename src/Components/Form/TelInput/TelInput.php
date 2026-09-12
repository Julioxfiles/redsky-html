<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\TelInput;

use RedSky\Html\Metadata\Example;
use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML telephone input component.
 *
 * The TelInput component generates a native HTML
 * <input type="tel"> element for entering telephone
 * numbers.
 *
 * The browser may provide a telephone-optimized keyboard
 * or input behavior depending on the device and platform.
 *
 * The component does not validate or normalize telephone
 * numbers. Validation rules should be applied separately
 * according to the requirements of the application.
 *
 * A name can optionally be supplied to identify the
 * telephone value when the containing form is submitted.
 *
 * Because TelInput extends the standard input component,
 * it also supports the common component methods for setting
 * HTML attributes, CSS classes, inline styles, values,
 * placeholders, and other input properties.
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
 * echo new TelInput('phone')
 *     ->placeholder('+52 667 123 4567')
 *     ->attribute('id', 'phone-input')
 *     ->attribute('autocomplete', 'tel')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="tel"
 *        name="phone"
 *        placeholder="+52 667 123 4567"
 *        id="phone-input"
 *        autocomplete="tel" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete telephone input',
    code: <<<'PHP'
    echo new TelInput('phone')
        ->placeholder('+52 667 123 4567')
        ->attribute('id', 'phone-input')
        ->attribute('autocomplete', 'tel')
        ->render();
    PHP,
    description: 'The TelInput component generates a native HTML
                 <input type="tel"> element for entering telephone
                 numbers.',
    language: 'php',
    primary: true,
    output: '<input type="tel" name="phone" placeholder="+52 667 123 4567" id="phone-input" autocomplete="tel" />'
)]
class TelInput extends Input
{
    /**
     * Creates a new telephone input component.
     *
     * The input type is automatically set to "tel".
     *
     * @param string|null $name Input name used to identify
     *                          the submitted telephone value.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'tel',
            $name
        );
    }
}