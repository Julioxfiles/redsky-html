<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\Menu;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Navigation\MenuItem\MenuItem;

/**
 * Represents an HTML menu component.
 *
 * The Menu component generates a semantic HTML <ul>
 * element intended to contain menu items.
 *
 * Menu components can be used as application menus
 * inside a MenuBar or as nested menus within MenuItems.
 *
 * Menu items are represented by MenuItem components and
 * can be added individually or as a collection using
 * addItem() and addItems().
 *
 * Common attributes and content methods inherited from
 * HtmlComponent can also be used, including class(),
 * style(), attribute(), addChild(), render(), and
 * __toString().
 *
 * This component is UI-library agnostic.
 *
 * @package RedSky\Html\Components\Navigation\Menu
 */
class Menu extends HtmlComponent
{
    /**
     * Creates a new menu component.
     *
     * The component generates a semantic HTML <ul>
     * element that can contain MenuItem components.
     */
    public function __construct()
    {
        parent::__construct('ul');

        $this->class('menu');
    }


    /**
     * Adds a single menu item.
     *
     * The supplied MenuItem is added as a child of
     * the menu element.
     *
     * @param MenuItem $item Menu item to add.
     *
     * @return static
     */
    public function addItem(
        MenuItem $item
    ): static {
        return $this->addChild(
            $item
        );
    }


    /**
     * Adds multiple menu items.
     *
     * Each MenuItem in the array is added to the
     * menu in the order provided.
     *
     * @param array<int, MenuItem> $items Menu items to add.
     *
     * @return static
     */
    public function addItems(
        array $items
    ): static {
        foreach ($items as $item) {
            $this->addItem(
                $item
            );
        }

        return $this;
    }
}