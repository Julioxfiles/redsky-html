<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Dropdown;

use RedSky\Html\Components\HtmlComponent;

/**
 * Dropdown menu component.
 *
 * Provides the container for dropdown items.
 *
 * The component is UI-library agnostic.
 * Dropdown behavior is handled by JavaScript.
 *
 * @package RedSky\Html\Components\Interactive\Dropdown
 */
class DropdownMenu extends HtmlComponent
{
    /**
     * Creates a new Dropdown menu.
     */
    public function __construct()
    {
        parent::__construct('div');

        $this->class('dropdown-menu');
    }
}
