<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Navigation\MenuItem;

/**
 * Represents an HTML menu component.
 *
 * The menu component generates a semantic HTML
 * ul element intended to contain navigation items.
 *
 * Menu items should be added using MenuItem
 * components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Navigation
 */
class Menu extends HtmlComponent
{
    /**
     * Creates a new menu component.
     */
    public function __construct()
    {
        parent::__construct('ul');
    }


    /**
     * Adds a menu item.
     *
     * @param MenuItem $item
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
     * @param array<int, MenuItem> $items
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