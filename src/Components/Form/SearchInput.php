<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML search input component.
 *
 * The SearchInput component generates a native HTML
 * <input type="search"> element for entering search terms.
 *
 * The search input is semantically intended for user-entered
 * search queries. Browsers may provide native search-specific
 * behavior and controls depending on the platform.
 *
 * A name can optionally be supplied to identify the search
 * value when the containing form is submitted.
 *
 * Because SearchInput extends the standard input component,
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
 * echo new SearchInput('query')
 *     ->placeholder('Search components...')
 *     ->attribute('id', 'component-search')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="search"
 *        name="query"
 *        placeholder="Search components..."
 *        id="component-search" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete search input',
    code: <<<'PHP'
    echo new SearchInput('query')
        ->placeholder('Search components...')
        ->attribute('id', 'component-search')
        ->render();
    PHP,
    description: 'The SearchInput component generates a native HTML
                 <input type="search"> element for entering search
                 queries.',
    language: 'php',
    primary: true,
    output: '<input type="search" name="query" placeholder="Search components..." id="component-search" />'
)]
class SearchInput extends Input
{
    /**
     * Creates a new search input component.
     *
     * The input type is automatically set to "search".
     *
     * @param string|null $name Input name used to identify
     *                          the submitted search value.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'search',
            $name
        );
    }
}