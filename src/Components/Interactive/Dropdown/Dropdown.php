<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Dropdown;

use RedSky\Html\Components\HtmlComponent;

/**
 * Dropdown component.
 *
 * Provides a container for a dropdown toggle
 * and its associated dropdown menu.
 *
 * The component is UI-library agnostic.
 * Dropdown behavior is handled by the associated
 * JavaScript component.
 *
 * @package RedSky\Html\Components\Interactive\Dropdown
 */
class Dropdown extends HtmlComponent
{
    /**
     * Creates a new Dropdown component.
     */
    public function __construct()
    {
        parent::__construct('div');

        $this->class('dropdown');
    }
}
