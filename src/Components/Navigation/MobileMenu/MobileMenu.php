<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\MobileMenu;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Navigation\Menu\Menu;


/**
 * Represents a mobile navigation menu component.
 *
 * The MobileMenu component stores the complete menu tree
 * and provides a single render container where JavaScript
 * displays the current navigation level.
 *
 * The navigation behavior is handled by mobile-menu.js.
 *
 * This component is UI-library agnostic.
 *
 * @package RedSky\Html\Components\Navigation\MobileMenu
 */
class MobileMenu extends HtmlComponent
{

    /**
     * Root menu source.
     *
     * The complete menu hierarchy is stored here
     * and used by JavaScript as navigation data.
     *
     * @var Menu|null
     */
    protected ?Menu $menu = null;



    /**
     * Creates a new mobile menu component.
     */
    public function __construct()
    {
        parent::__construct('nav');

        $this->class(
            'mobile-menu'
        );

        $this->attribute(
            'data-redsky-component',
            'mobile-menu'
        );
    }



    /**
     * Adds the navigation menu tree.
     *
     * The menu is stored and rendered as a hidden
     * source tree. JavaScript will render only the
     * current level inside the mobile-menu-root
     * container.
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
     * Returns the current menu tree.
     *
     * @return Menu|null
     */
    public function getMenu(): ?Menu
    {
        return $this->menu;
    }



    /**
     * Renders the MobileMenu.
     *
     * Structure:
     *
     * <nav>
     *
     *     <div class="mobile-menu-root"></div>
     *
     *     <div class="mobile-menu-source">
     *         complete menu tree
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
         * Visible navigation container.
         *
         * JavaScript replaces this content
         * with the current menu level.
         */
        $html .= '<div class="mobile-menu-root"></div>';



        /*
         * Complete menu tree.
         *
         * Hidden source used by JavaScript.
         */
        $html .= '<div class="mobile-menu-source" hidden>';


        if ($this->menu !== null) {

            $html .= $this->menu->render();

        }


        $html .= '</div>';


        $html .= '</nav>';


        return $html;
    }
}