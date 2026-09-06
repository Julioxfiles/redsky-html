<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Link\Link;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML menu item component.
 *
 * The MenuItem component generates a semantic HTML <li>
 * element intended to be used as an individual item within
 * a navigation menu.
 *
 * A menu item acts as a container and can contain a Link
 * component, other HTML components, or nested navigation
 * structures.
 *
 * MenuItem components are commonly added to a Menu
 * component using its addItem() or addItems() methods.
 *
 * Common attributes and child-management methods inherited
 * from HtmlComponent can also be used, including class(),
 * style(), attribute(), addChild(), render(), and __toString().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Navigation
 */
#[Example(
    title: 'Menu Item',
    code: <<<'PHP'
    echo (new MenuItem())
        ->addChild(
            new Link('/about', 'About')
        )
        ->render();
    PHP,
    description: 'Creates a semantic list item containing a
                 navigation link. MenuItem is typically used
                 as a child of a Menu component.',
    language: 'php',
    primary: true,
    output: '<li><a href="/about">About</a></li>'
)]
class MenuItem extends HtmlComponent
{
    /**
     * Creates a new menu item component.
     *
     * The component generates an HTML <li> element
     * that can contain navigation content.
     */
    public function __construct()
    {
        parent::__construct('li');
    }
}