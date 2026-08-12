<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <section> element.
 *
 * A thematic grouping of related content, typically with its
 * own heading.
 *
 * Example:
 *
 * ```php
 * $section = (new Section())
 *     ->id('about')
 *     ->addChild(
 *         (new Heading(2))->text('About Us'),
 *         (new Paragraph())->text('Company information...')
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <section id="about">
 *     <h2>About Us</h2>
 *     <p>Company information...</p>
 * </section>
 * ```
 */
class Section extends HtmlComponent
{
    /**
     * Creates a new section component.
     */
    public function __construct()
    {
        parent::__construct('section');
    }
}