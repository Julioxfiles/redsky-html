<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

/**
 * The EmailInput component generates a native HTML
 * <input type="email"> element that allows users to
 * enter an email address.
 *
 * The browser can provide built-in validation for the
 * email format when the containing form is submitted.
 *
 * A name can optionally be supplied to identify the value
 * when the containing form is submitted.
 *
 * Because EmailInput extends the standard input component,
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
 * echo new EmailInput('email')
 *     ->class('email-input')
 *     ->style('color:cornflowerblue')
 *     ->attribute('id', 'email-input')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="email"
 *        name="email"
 *        class="email-input"
 *        style="color:cornflowerblue"
 *        id="email-input" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete email input',
    code: <<<'PHP'
echo new EmailInput('email')
    ->class('email-input')
    ->style('color:cornflowerblue')
    ->attribute('id', 'email-input')
    ->attribute('placeholder', 'Enter your email')
    ->attribute('required', true)
    ->render();
PHP,
    description: 'The EmailInput component generates a native HTML
                 <input type="email"> element for entering email
                 addresses and supports the standard input component
                 methods for additional configuration.',
    language: 'php',
    primary: true,
    output: '<input type="email" name="email" class="email-input" style="color:cornflowerblue" id="email-input" placeholder="Enter your email" required />'
)]
class EmailInput extends Input
{
    /**
     * Creates a new email input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'email',
            $name
        );
    }
}