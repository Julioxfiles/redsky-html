<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\StackMenu;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Navigation\Menu\Menu;


/**
 * Represents a stack-based navigation menu component.
 *
 * StackMenu provides a dynamic navigation container
 * where JavaScript displays the current menu level.
 *
 * The menu hierarchy is provided by a Menu component.
 * StackMenu manages navigation between menu levels
 * using a stack-based history.
 *
 * This component is UI-library agnostic.
 *
 * @package RedSky\Html\Components\Navigation\StackMenu
 */
class StackMenu extends HtmlComponent
{

    /**
     * Source menu tree.
     *
     * The menu hierarchy used by JavaScript
     * to navigate between levels.
     *
     * @var Menu|null
     */
    protected ?Menu $menu = null;



    /**
     * Creates a new stack menu component.
     */
    public function __construct()
    {
        parent::__construct('nav');

        $this->class(
            'stack-menu'
        );

        $this->attribute(
            'data-redsky-component',
            'stack-menu'
        );
    }



    /**
     * Adds the navigation menu tree.
     *
     * The menu is rendered as a hidden source.
     * JavaScript uses this structure to display
     * the current navigation level inside
     * stack-menu-root.
     *
     * @param Menu $menu
     *
     * @return static
     */
    public function addMenu(
        Menu $menu
    ): static {

        $this->menu = $menu;

        return $this;
    }



    /**
     * Returns the source menu tree.
     *
     * @return Menu|null
     */
    public function getMenu(): ?Menu
    {
        return $this->menu;
    }



    /**
     * Renders the StackMenu structure.
     *
     * Structure:
     *
     * <nav>
     *
     *     <div class="stack-menu-root"></div>
     *
     *     <div class="stack-menu-source" hidden>
     *         menu tree
     *     </div>
     *
     * </nav>
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();


        $html = sprintf(
            '<nav%s>',
            $attributes
        );


        /*
         * Dynamic navigation container.
         *
         * JavaScript updates this element
         * with the active menu level.
         */
        $html .= '<div class="stack-menu-root"></div>';



        /*
         * Source menu tree.
         *
         * Hidden from the user and used
         * as navigation data.
         */
        $html .= '<div class="stack-menu-source" hidden>';


        if ($this->menu !== null) {

            $html .= $this->menu->render();

        }


        $html .= '</div>';


        $html .= '</nav>';


        return $html;
    }
}