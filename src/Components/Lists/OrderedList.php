<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML ordered list component.
 *
 * The ordered list component generates a semantic
 * HTML ol element.
 *
 * List items should be added using ListItem
 * components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Lists
 */
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


    /**
     * Sets the starting number.
     *
     * @param int $start
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
     * Reverses the numbering order.
     *
     * @param bool $reverse
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
     * Sets numbering style.
     *
     * Typical values:
     * 1
     * A
     * a
     * I
     * i
     *
     * @param string $type
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