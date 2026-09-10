<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a layout column that contains child components.
 *
 * The Column component provides a generic, UI-library-agnostic
 * container for grouping and arranging child components within
 * a Row or another layout component.
 *
 * Column extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Child components can be added individually using the inherited
 * addChild() method or in groups using the inherited addChildren()
 * method.
 *
 * The component does not apply any framework-specific classes
 * or styles. UI-library-specific classes such as Bootstrap's
 * col-md-4 or Materialize's col s4 can be added by the caller.
 *
 * Example:
 *
 * ```php
 * echo (new Column())
 *     ->addChild(
 *         (new Heading(2))->text('Customer')
 *     )
 *     ->addChild(
 *         (new Paragraph())->text('John Doe')
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <div data-redsky-component="column">
 *     <h2>Customer</h2>
 *     <p>John Doe</p>
 * </div>
 * ```
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
