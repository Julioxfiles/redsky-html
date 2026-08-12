<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <aside> element.
 *
 * An aside contains content that is indirectly related to the
 * surrounding content, such as sidebars, notes, advertisements,
 * related links, or complementary information.
 *
 * Example:
 *
 * ```php
 * $aside = (new Aside())
 *     ->addChild(
 *         (new Heading(3))->text('Related Articles'),
 *         (new UnorderedList())
 *             ->addChild(new ListItem('Getting Started'))
 *             ->addChild(new ListItem('Advanced Topics'))
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <aside>
 *     <h3>Related Articles</h3>
 *     <ul>
 *         <li>Getting Started</li>
 *         <li>Advanced Topics</li>
 *     </ul>
 * </aside>
 * ```
 */
class Aside extends HtmlComponent
{
    /**
     * Creates a new aside component.
     */
    public function __construct()
    {
        parent::__construct('aside');
    }
}