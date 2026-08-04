<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML menu item component.
 *
 * The menu item component generates a semantic
 * HTML li element used inside navigation menus.
 *
 * A menu item can contain links or nested menu
 * structures.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Navigation
 */
class MenuItem extends HtmlComponent
{
    /**
     * Creates a new menu item component.
     */
    public function __construct()
    {
        parent::__construct('li');
    }
}