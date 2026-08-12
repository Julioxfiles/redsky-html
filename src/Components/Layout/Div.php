<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <div> element.
 *
 * A generic block-level container used to group and organize
 * other HTML components.
 *
 * Example:
 *
 * ```php
 * $div = (new Div())
 *     ->class('container')
 *     ->addChild(
 *         (new Paragraph())->text('Hello World')
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <div class="container">
 *     <p>Hello World</p>
 * </div>
 * ```
 */
class Div extends HtmlComponent
{
    /**
     * Creates a new div component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }
}