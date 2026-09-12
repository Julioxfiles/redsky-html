<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\Navbar;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a navigation bar.
 *
 * The Navbar component provides a UI-library-agnostic navigation
 * structure that can contain a brand and an array of navigation
 * items.
 *
 * Navigation items are represented as associative arrays containing
 * a label and an href value.
 *
 * Example:
 *
 * ```php
 * $navbar = new Navbar();
 *
 * $navbar
 *     ->brand('RedSky')
 *     ->addItems([
 *         ['label' => 'Home', 'href' => '/'],
 *         ['label' => 'Customers', 'href' => '/customers'],
 *         ['label' => 'Orders', 'href' => '/orders'],
 *     ]);
 *
 * echo $navbar;
 * ```
 *
 * Produces:
 *
 * ```html
 * <nav data-redsky-component="navbar">
 *     <a data-navbar-brand href="/">RedSky</a>
 *     <ul data-navbar-items>
 *         <li data-navbar-item>
 *             <a href="/">Home</a>
 *         </li>
 *         <li data-navbar-item>
 *             <a href="/customers">Customers</a>
 *         </li>
 *         <li data-navbar-item>
 *             <a href="/orders">Orders</a>
 *         </li>
 *     </ul>
 * </nav>
 * ```
 *
 * @package RedSky\Html\Components\Navigation
 */
class Navbar extends HtmlComponent
{
    /**
     * Navigation brand.
     */
    protected ?string $brand = null;

    /**
     * Navigation items.
     *
     * @var array<int, array{label:string, href:string}>
     */
    protected array $items = [];

    /**
     * Creates a new Navbar component.
     */
    public function __construct()
    {
        parent::__construct('nav');

        $this->attribute(
            'data-redsky-component',
            'navbar'
        );
    }

    /**
     * Sets the navigation brand.
     */
    public function brand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Returns the navigation brand.
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * Adds a navigation item.
     */
    public function addItem(
        string $label,
        string $href
    ): static {
        $this->items[] = [
            'label' => $label,
            'href' => $href,
        ];

        return $this;
    }

    /**
     * Adds multiple navigation items.
     *
     * @param array<int, array{label:string, href:string}> $items
     */
    public function addItems(array $items): static
    {
        foreach ($items as $item) {
            $this->addItem(
                $item['label'],
                $item['href']
            );
        }

        return $this;
    }

    /**
     * Sets the navigation items.
     *
     * @param array<int, array{label:string, href:string}> $items
     */
    public function items(array $items): static
    {
        $this->items = [];

        return $this->addItems($items);
    }

    /**
     * Returns the navigation items.
     *
     * @return array<int, array{label:string, href:string}>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Renders the navigation bar.
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $html = sprintf(
            '<nav%s>',
            $attributes
        );

        if ($this->brand !== null) {
            $html .= sprintf(
                '<a data-navbar-brand href="/">%s</a>',
                htmlspecialchars(
                    $this->brand,
                    ENT_QUOTES,
                    'UTF-8'
                )
            );
        }

        if ($this->items !== []) {
            $html .= '<ul data-navbar-items>';

            foreach ($this->items as $item) {
                $label = htmlspecialchars(
                    $item['label'],
                    ENT_QUOTES,
                    'UTF-8'
                );

                $href = htmlspecialchars(
                    $item['href'],
                    ENT_QUOTES,
                    'UTF-8'
                );

                $html .= sprintf(
                    '<li data-navbar-item><a href="%s">%s</a></li>',
                    $href,
                    $label
                );
            }

            $html .= '</ul>';
        }

        $html .= $this->renderChildren();

        $html .= '</nav>';

        return $html;
    }
}