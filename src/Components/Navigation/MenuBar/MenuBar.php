<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\MenuBar;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Navigation\Menu\Menu;

/**
 * Represents a menu bar component.
 *
 * The MenuBar component generates a semantic HTML <nav>
 * element intended to contain application menus.
 *
 * Menus are represented by Menu components and can be
 * added individually or as a collection using addMenu()
 * and addMenus().
 *
 * Common attributes and content methods inherited from
 * HtmlComponent can also be used, including class(),
 * style(), attribute(), addChild(), render(), and
 * __toString().
 *
 * This component is UI-library agnostic and does not
 * apply any default visual styling.
 *
 * @package RedSky\Html\Components\Navigation
 */
class MenuBar extends HtmlComponent
{
    /**
     * Creates a new menu bar component.
     *
     * The component generates a semantic HTML <nav>
     * element that can contain Menu components.
     */
    public function __construct()
    {
        parent::__construct('nav');

        $this
            ->class('menu-bar')
            ->role('menubar');
    }


    /**
     * Adds a single menu.
     *
     * The supplied Menu is added as a child of
     * the menu bar.
     *
     * @param Menu $menu Menu to add.
     *
     * @return static
     */
    public function addMenu(
        Menu $menu
    ): static {
        return $this->addChild(
            $menu
        );
    }


    /**
     * Adds multiple menus.
     *
     * Each Menu in the array is added to the
     * menu bar in the order provided.
     *
     * @param array<int, Menu> $menus Menus to add.
     *
     * @return static
     */
    public function addMenus(
        array $menus
    ): static {
        foreach ($menus as $menu) {
            $this->addMenu(
                $menu
            );
        }

        return $this;
    }
}