<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\Nav;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML navigation component.
 *
 * The Nav component generates a semantic HTML <nav>
 * element used to contain navigation links and other
 * navigation-related content.
 *
 * Navigation content can be added using the child-management
 * methods inherited from HtmlComponent, such as addChild().
 *
 * Common attributes and rendering methods inherited from
 * HtmlComponent can also be used, including class(),
 * style(), attribute(), render(), and __toString().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Navigation
 */
class Nav extends HtmlComponent
{
    /**
     * Creates a new navigation component.
     *
     * The component generates an HTML <nav> element
     * that can contain navigation links or other
     * navigation-related components.
     */
    public function __construct()
    {
        parent::__construct('nav');
    }
}