<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents a generic HTML container component.
 *
 * The container component renders a neutral HTML div
 * element and provides a reusable structure for
 * grouping other components.
 *
 * This component does not apply any UI framework
 * classes or styles. UI customization is handled
 * by higher level layers such as redsky-ui.
 *
 * @package RedSky\Html\Components
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