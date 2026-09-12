<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists\UnorderedList;

use RedSky\Html\Components\HtmlComponent;

use RedSky\Html\Components\Lists\ListItem;

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
 * @package RedSky\Html\Components\Lists
 */
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