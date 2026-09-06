<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <ol> element.
 *
 * The OrderedList component generates a semantic HTML <ol>
 * element used to represent a list of items where the order
 * of the items is meaningful.
 *
 * List items are represented by ListItem components and can
 * be added individually using addItem() or in groups using
 * addItems().
 *
 * The component supports configuring the starting number,
 * reversing the numbering order, and selecting the numbering
 * style through the start(), reversed(), and type() methods.
 *
 * OrderedList extends HtmlComponent and inherits common
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
 * echo (new OrderedList())
 *     ->start(3)
 *     ->addItems([
 *         new ListItem('First item'),
 *         new ListItem('Second item'),
 *         new ListItem('Third item'),
 *     ])
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <ol start="3"><li>First item</li><li>Second item</li><li>Third item</li></ol>
 * ```
 *
 * @package RedSky\Html\Components\Lists
 */
#[Example(
    title: 'Ordered List',
    code: <<<'PHP'
    echo (new OrderedList())
        ->start(3)
        ->addItems([
            new ListItem('First item'),
            new ListItem('Second item'),
            new ListItem('Third item'),
        ])
        ->render();
    PHP,
    description: 'The OrderedList component generates a semantic
                 HTML <ol> element for ordered content. It provides
                 methods for adding list items and configuring the
                 starting number, numbering direction, and numbering
                 style.',
    language: 'php',
    primary: true,
    output: '<ol start="3"><li>First item</li><li>Second item</li><li>Third item</li></ol>'
)]
class OrderedList extends HtmlComponent
{
    /**
     * Creates a new ordered list component.
     */
    public function __construct()
    {
        parent::__construct('ol');
    }

    /**
     * Adds a list item to the ordered list.
     *
     * @param ListItem $item List item component.
     *
     * @return static
     */
    public function addItem(
        ListItem $item
    ): static {
        return $this->addChild($item);
    }

    /**
     * Adds multiple list items to the ordered list.
     *
     * @param array<int, ListItem> $items List item components.
     *
     * @return static
     */
    public function addItems(
        array $items
    ): static {
        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * Sets the starting number for the ordered list.
     *
     * Corresponds to the HTML `start` attribute.
     *
     * @param int $start Starting number.
     *
     * @return static
     */
    public function start(
        int $start
    ): static {
        return $this->attribute(
            'start',
            $start
        );
    }

    /**
     * Enables or disables reverse numbering.
     *
     * When enabled, the list numbers decrease rather than
     * increase as the items progress.
     *
     * Corresponds to the HTML `reversed` attribute.
     *
     * @param bool $reverse Whether numbering should be reversed.
     *
     * @return static
     */
    public function reversed(
        bool $reverse = true
    ): static {
        return $this->attribute(
            'reversed',
            $reverse
        );
    }

    /**
     * Sets the numbering style for the ordered list.
     *
     * Common values include:
     *
     * - `1` for decimal numbers
     * - `A` for uppercase letters
     * - `a` for lowercase letters
     * - `I` for uppercase Roman numerals
     * - `i` for lowercase Roman numerals
     *
     * Corresponds to the HTML `type` attribute.
     *
     * @param string $type Numbering style.
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        return $this->attribute(
            'type',
            $type
        );
    }
}