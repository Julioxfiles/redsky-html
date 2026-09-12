<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists\UnorderedList;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <ul> element.
 *
 * The UnorderedList component generates a semantic HTML <ul>
 * element used to represent a list of items where the order
 * of the items is not inherently meaningful.
 *
 * List items are represented by ListItem components and can
 * be added individually using addItem() or in groups using
 * addItems().
 *
 * UnorderedList extends HtmlComponent and inherits common
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
 * echo (new UnorderedList())
 *     ->addItems([
 *         new ListItem('Getting Started'),
 *         new ListItem('Installation'),
 *         new ListItem('Configuration'),
 *     ])
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <ul><li>Getting Started</li><li>Installation</li><li>Configuration</li></ul>
 * ```
 *
 * @package RedSky\Html\Components\Lists
 */
#[Example(
    title: 'Unordered List',
    code: <<<'PHP'
    echo (new UnorderedList())
        ->addItems([
            new ListItem('Getting Started'),
            new ListItem('Installation'),
            new ListItem('Configuration'),
        ])
        ->render();
    PHP,
    description: 'The UnorderedList component generates a
                 semantic HTML <ul> element for a collection
                 of items where their order is not inherently
                 meaningful. List items are added using ListItem
                 components.',
    language: 'php',
    primary: true,
    output: '<ul><li>Getting Started</li><li>Installation</li><li>Configuration</li></ul>'
)]
class UnorderedList extends HtmlComponent
{
    /**
     * Creates a new unordered list component.
     */
    public function __construct()
    {
        parent::__construct('ul');
    }

    /**
     * Adds a list item to the unordered list.
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
     * Adds multiple list items to the unordered list.
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
}