<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <header> element.
 *
 * A header represents introductory content for a page or
 * section. It typically contains headings, logos, navigation,
 * search forms, or introductory information.
 *
 * Example:
 *
 * ```php
 * $header = (new Header())
 *     ->addChild(
 *         (new Heading(1))->text('RedSky Framework'),
 *         (new Paragraph())->text('Modern PHP Components')
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <header>
 *     <h1>RedSky Framework</h1>
 *     <p>Modern PHP Components</p>
 * </header>
 * ```
 */
class Header extends HtmlComponent
{
    /**
     * Creates a new header component.
     */
    public function __construct()
    {
        parent::__construct('header');
    }
}