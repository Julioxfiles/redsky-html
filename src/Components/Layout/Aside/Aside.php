<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Aside;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <aside> element.
 *
 * The Aside component generates a semantic HTML <aside>
 * element used for content that is indirectly related to
 * the surrounding content.
 *
 * Common uses include sidebars, related articles, notes,
 * advertisements, navigation links, supplementary information,
 * and other complementary content.
 *
 * @package RedSky\Html\Components\Layout
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