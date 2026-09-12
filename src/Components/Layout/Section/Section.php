<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Section;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <section> element.
 *
 * The Section component generates a semantic HTML <section>
 * element used to represent a thematic grouping of related
 * content within a document.
 *
 * A section commonly represents a distinct topic or subject
 * and will typically contain its own heading. It can be used
 * to organize the primary content of a page into meaningful
 * structural groups.
 *
 * @package RedSky\Html\Components\Layout
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