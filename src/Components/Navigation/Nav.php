<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML navigation component.
 *
 * The nav component generates a semantic HTML nav
 * element used to contain navigation links.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Navigation
 */
class Nav extends HtmlComponent
{
    /**
     * Creates a new navigation component.
     */
    public function __construct()
    {
        parent::__construct('nav');
    }
}