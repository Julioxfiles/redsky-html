<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Container;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents a generic HTML container component.
 *
 * The Container component generates a neutral HTML <div>
 * element that can be used as a reusable structural container
 * for grouping other HTML components.
 *
 * @package RedSky\Html\Components\Container
 */
class Container extends HtmlComponent
{
    /**
     * Creates a new container component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }
}