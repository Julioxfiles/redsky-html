<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML unordered list component.
 *
 * The unordered list component generates a semantic
 * HTML ul element.
 *
 * List items should be added using ListItem
 * components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
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
     * Adds a list item.
     *
     * @param ListItem $item
     *
     * @return static
     */
    public function addItem(
        ListItem $item
    ): static {
        return $this->addChild($item);
    }


    /**
     * Adds multiple list items.
     *
     * @param array<int, ListItem> $items
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