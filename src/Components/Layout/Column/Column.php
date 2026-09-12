<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Column;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a layout column that contains child components.
 *
 * The Column component provides a generic, UI-library-agnostic
 * container for grouping and arranging child components within
 * a Row or another layout component.
 *
 * @package RedSky\Html\Components\Layout
 */
class Column extends HtmlComponent
{
    /**
     * Creates a new column component.
     */
    public function __construct()
    {
        parent::__construct('div');

        $this->attribute(
            'data-redsky-component',
            'column'
        );
    }
}
