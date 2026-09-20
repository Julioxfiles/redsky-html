<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists\ListGroup;

use RedSky\Html\Components\Lists\ListItem\ListItem;
use RedSky\Html\Components\Lists\UnorderedList\UnorderedList;


/**
 * Represents a list group component.
 *
 * ListGroup provides a collection of related list items.
 * It extends UnorderedList and uses ListItem components
 * for individual items.
 *
 * The component is UI-library agnostic. Its CSS class names
 * follow common conventions such as "list-group" and
 * "list-group-item", but no external UI library is required.
 *
 * @package RedSky\Html\Components\Lists
 */
class ListGroup extends UnorderedList
{
    /**
     * Creates a new ListGroup component.
     */
    public function __construct()
    {
        parent::__construct();

        $this->class('list-group');
    }


    /**
     * Adds a list item to the group.
     *
     * The list-group-item class is automatically applied
     * to the supplied ListItem component.
     *
     * @param ListItem $item List item component.
     *
     * @return static
     */
    public function addItem(
        ListItem $item
    ): static {
        $item->class('list-group-item');

        return parent::addItem($item);
    }


    /**
     * Adds multiple list items to the group.
     *
     * The list-group-item class is automatically applied
     * to each supplied ListItem component.
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