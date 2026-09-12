<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;
use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML URL input component.
 *
 * The UrlInput component generates a semantic HTML
 * <input type="url"> element for entering web addresses
 * and other URL values.
 *
 * It extends Input and inherits common input functionality,
 * including methods for setting values, placeholders, classes,
 * styles, attributes, and other HTML input attributes.
 *
 * Browsers may provide built-in validation and user interface
 * behavior appropriate for URL input elements.
 *
 * UrlInput is UI-library agnostic and does not apply
 * default classes or styles.
 *
 * The component uses fluent methods, allowing multiple
 * configuration calls to be chained together.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo new UrlInput('website')
 *     ->value('https://example.com')
 *     ->placeholder('https://example.com')
 *     ->attribute('id', 'website-input')
 *     ->required()
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="url"
 *        name="website"
 *        value="https://example.com"
 *        placeholder="https://example.com"
 *        id="website-input"
 *        required />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete URL input',
    code: <<<'PHP'
    echo new UrlInput('website')
        ->value('https://example.com')
        ->placeholder('https://example.com')
        ->attribute('id', 'website-input')
        ->required()
        ->render();
    PHP,
    description: 'The UrlInput component generates a semantic HTML
                 <input type="url"> element for entering web
                 addresses and inherits the common configuration
                 methods provided by the Input component.',
    language: 'php',
    primary: true,
    output: '<input type="url" name="website" value="https://example.com" placeholder="https://example.com" id="website-input" required />'
)]
class UrlInput extends Input
{
    /**
     * Creates a new URL input component.
     *
     * The input type is automatically set to `url`.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'url',
            $name
        );
    }
}