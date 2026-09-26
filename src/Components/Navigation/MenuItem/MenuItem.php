<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\MenuItem;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Interactive\Button\Button;
use RedSky\Html\Components\Navigation\Link\Link;
use RedSky\Html\Components\Navigation\Menu\Menu;

/**
 * Represents an HTML menu item component.
 *
 * The MenuItem component generates a semantic HTML <li>
 * element intended to be used within a Menu component.
 *
 * A menu item can contain a Link or Button component
 * representing a navigation target or an application
 * action.
 *
 * A menu item can also contain a nested Menu, allowing
 * hierarchical application menus and submenus.
 *
 * This component is UI-library agnostic.
 *
 * @package RedSky\Html\Components\Navigation\MenuItem
 */
class MenuItem extends HtmlComponent
{
    /**
     * Keyboard shortcut associated with this menu item.
     *
     * @var string|null
     */
    protected ?string $shortcut = null;


    /**
     * Creates a new menu item component.
     *
     * @param string|null $text
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('li');

        $this->class('menu-item');

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets the menu item text.
     *
     * @param string $text
     *
     * @return static
     */
    public function text(
        string $text
    ): static {
        $this->clearChildren();

        $this->setContent($text);

        return $this;
    }


    /**
     * Sets the menu item as a navigation link.
     *
     * @param string $href
     *
     * @return static
     */
    public function href(
        string $href
    ): static {
        $text = $this->content();

        $this->clearContent();
        $this->clearChildren();

        $this
            ->removeAttribute('tabindex')
            ->removeAttribute('aria-haspopup')
            ->removeAttribute('aria-expanded');

        $link = new Link(
            $href,
            is_string($text) ? $text : null
        );

        $this->addChild($link);

        return $this;
    }


    /**
     * Sets the menu item as an application action.
     *
     * @param string $script
     *
     * @return static
     */
    public function onClick(
        string $script
    ): static {
        $text = $this->content();

        $this->clearContent();
        $this->clearChildren();

        $this
            ->removeAttribute('tabindex')
            ->removeAttribute('aria-haspopup')
            ->removeAttribute('aria-expanded');

        $button = new Button(
            is_string($text) ? $text : null
        );

        $button->attribute(
            'onclick',
            $script
        );

        $this->addChild($button);

        return $this;
    }


    /**
     * Adds a nested submenu.
     *
     * The submenu is added as a child of this menu item.
     *
     * @param Menu $menu Submenu to add.
     *
     * @return static
     */
    public function addSubmenu(
        Menu $menu
    ): static {
        $this
            ->attribute('class', 'menu-item has-submenu')
            ->attribute('tabindex', '0')
            ->aria('haspopup', 'true')
            ->aria('expanded', 'false');

        return $this->addChild(
            $menu
        );
    }


    /**
     * Determines whether this menu item has a submenu.
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
     * Sets the keyboard shortcut associated with this menu item.
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
     * Renders the menu item children.
     *
     * The shortcut is rendered inside the action element
     * so that the menu text and shortcut can be sized and
     * aligned as a single menu row.
     *
     * @return string
     */
    protected function renderChildren(): string
    {
        $html = parent::renderChildren();

        if ($this->shortcut === null) {
            return $html;
        }

        $shortcut = sprintf(
            '<span class="menu-item-shortcut">%s</span>',
            htmlspecialchars(
                $this->shortcut,
                ENT_QUOTES,
                'UTF-8'
            )
        );

        return preg_replace(
            '/(<(?:a|button)\b[^>]*>)(.*?)(<\/(?:a|button)>)/s',
            '$1<span class="menu-item-text">$2</span>' . $shortcut . '$3',
            $html,
            1
        ) ?? $html;
    }
}