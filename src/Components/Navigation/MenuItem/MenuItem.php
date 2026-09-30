<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\MenuItem;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Navigation\Menu\Menu;


/**
 * Represents an HTML menu item component.
 *
 * A MenuItem can contain:
 *
 * - text
 * - navigation actions
 * - click actions
 * - nested menus
 * - arbitrary child components
 *
 * @package RedSky\Html\Components\Navigation\MenuItem
 */
class MenuItem extends HtmlComponent
{
    /**
     * Navigation target.
     *
     * @var string|null
     */
    protected ?string $navigation = null;


    /**
     * JavaScript action.
     *
     * @var string|null
     */
    protected ?string $clickScript = null;


    /**
     * Keyboard shortcut.
     *
     * @var string|null
     */
    protected ?string $shortcut = null;



    /**
     * Creates a new menu item.
     *
     * @param string|null $text
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('li');

        $this->class(
            'menu-item'
        );


        if ($text !== null) {
            $this->text($text);
        }
    }



    /**
     * Sets menu item text.
     *
     * Does not remove existing children.
     * This allows mixing text and components.
     *
     * @param string $text
     *
     * @return static
     */
    public function text(
        string $text
    ): static {

        $this->setContent(
            $text
        );

        return $this;
    }



    /**
     * Sets navigation target.
     *
     * @param string $href
     *
     * @return static
     */
    public function href(
        string $href
    ): static {

        $this->navigation = $href;
        $this->clickScript = null;

        return $this;
    }



    /**
     * Alias of href().
     *
     * @param string $url
     *
     * @return static
     */
    public function url(
        string $url
    ): static {

        return $this->href(
            $url
        );
    }



    /**
     * Alias of href().
     *
     * @param string $uri
     *
     * @return static
     */
    public function uri(
        string $uri
    ): static {

        return $this->href(
            $uri
        );
    }



    /**
     * Sets JavaScript action.
     *
     * @param string $script
     *
     * @return static
     */
    public function onClick(
        string $script
    ): static {

        $this->clickScript = $script;
        $this->navigation = null;

        return $this;
    }



    /**
     * Adds a nested submenu.
     *
     * @param Menu $menu
     *
     * @return static
     */
    public function addSubmenu(
        Menu $menu
    ): static {

        $this->class(
            'menu-item has-submenu'
        );

        $this->attribute(
            'tabindex',
            '0'
        );

        $this->aria(
            'haspopup',
            'true'
        );

        $this->aria(
            'expanded',
            'false'
        );


        return $this->addChild(
            $menu
        );
    }



    /**
     * Determines whether this item contains submenu.
     *
     * @return bool
     */
    public function hasSubmenu(): bool
    {
        foreach ($this->children() as $child) {

            if ($child instanceof Menu) {
                return true;
            }

        }

        return false;
    }



    /**
     * Sets keyboard shortcut.
     *
     * @param string $shortcut
     *
     * @return static
     */
    public function shortcut(
        string $shortcut
    ): static {

        $this->shortcut = $shortcut;

        return $this;
    }



    /**
     * Gets navigation target.
     *
     * @return string|null
     */
    public function getNavigation(): ?string
    {
        return $this->navigation;
    }



    /**
     * Gets click action.
     *
     * @return string|null
     */
    public function getClickScript(): ?string
    {
        return $this->clickScript;
    }



    /**
     * Renders menu item.
     *
     * @return string
     */
    public function render(): string
    {

        if ($this->navigation !== null) {

            $this->attribute(
                'data-menu-href',
                $this->navigation
            );

        } else {

            $this->removeAttribute(
                'data-menu-href'
            );

        }


        if ($this->clickScript !== null) {

            $this->attribute(
                'data-menu-onclick',
                $this->clickScript
            );

        } else {

            $this->removeAttribute(
                'data-menu-onclick'
            );

        }


        return parent::render();
    }



    /**
     * Adds shortcut after children.
     *
     * @return string
     */
    protected function renderChildren(): string
    {

        $html =
            parent::renderChildren();


        if ($this->shortcut === null) {
            return $html;
        }


        return $html .
            sprintf(
                '<span class="menu-item-shortcut">%s</span>',
                htmlspecialchars(
                    $this->shortcut,
                    ENT_QUOTES,
                    'UTF-8'
                )
            );
    }
}