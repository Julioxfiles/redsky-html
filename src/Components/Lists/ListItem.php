<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <li> element.
 *
 * The ListItem component generates a semantic HTML <li>
 * element used to represent an individual item within an
 * ordered (<ol>) or unordered (<ul>) list.
 *
 * The item text can be provided through the constructor.
 * Additional content and child components can be configured
 * using the functionality inherited from HtmlComponent.
 *
 * The value() method can be used when the ListItem belongs
 * to an ordered list and the automatic numbering needs to
 * be overridden.
 *
 * ListItem extends HtmlComponent and inherits common
 * functionality for managing attributes, classes, styles,
 * content, children, rendering, and fluent configuration.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new ListItem('Third item'))
 *     ->value(3)
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <li value="3">Third item</li>
 * ```
 *
 * @package RedSky\Html\Components\Lists
 */
#[Example(
    title: 'Ordered List Item',
    code: <<<'PHP'
    echo (new ListItem('Third item'))
        ->value(3)
        ->render();
    PHP,
    description: 'The ListItem component generates a semantic
                 HTML <li> element for an individual list item.
                 The value() method can be used with ordered
                 lists to override the automatic numbering.',
    language: 'php',
    primary: true,
    output: '<li value="3">Third item</li>'
)]
class ListItem extends HtmlComponent
{
    /**
     * Creates a new list item component.
     *
     * @param string|null $text Item text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('li');

        if ($text !== null) {
            $this->text($text);
        }
    }

    /**
     * Sets the numeric value of the list item.
     *
     * When the item belongs to an ordered list, this value
     * overrides the position that would otherwise be assigned
     * automatically by the browser.
     *
     * The value attribute has no numbering effect when the
     * item is used inside an unordered list.
     *
     * @param int $value Numeric value for the list item.
     *
     * @return static
     */
    public function value(
        int $value
    ): static {
        return $this->attribute(
            'value',
            $value
        );
    }
}