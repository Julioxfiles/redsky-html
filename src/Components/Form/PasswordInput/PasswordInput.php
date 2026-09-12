<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\PasswordInput;

use RedSky\Html\Metadata\Example;
use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML password input component.
 *
 * The PasswordInput component generates a native HTML
 * <input type="password"> element for entering sensitive
 * text such as passwords or other secret values.
 *
 * The browser masks the characters entered into the input
 * field according to its native password-input behavior.
 *
 * A name can optionally be supplied to identify the value
 * when the containing form is submitted.
 *
 * Because PasswordInput extends the standard input component,
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
 * echo new PasswordInput('password')
 *     ->class('dark')
 *     ->attribute('id', 'password-input')
 *     ->attribute('autocomplete', 'current-password')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="password"
 *        name="password"
 *        class="dark"
 *        id="password-input"
 *        autocomplete="current-password" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete password input',
    code: <<<'PHP'
    echo new PasswordInput('password')
        ->class('dark')
        ->attribute('id', 'password-input')
        ->attribute('autocomplete', 'current-password')
        ->render();
    PHP,
    description: 'The PasswordInput component generates a native HTML
                 <input type="password"> element for entering passwords
                 and other sensitive text values.',
    language: 'php',
    primary: true,
    output: '<input type="password" name="password" class="dark" id="password-input" autocomplete="current-password" />'
)]
class PasswordInput extends Input
{
    /**
     * Creates a new password input component.
     *
     * The input type is automatically set to "password".
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'password',
            $name
        );
    }
}