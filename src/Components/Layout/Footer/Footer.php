<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Footer;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <footer> element.
 *
 * The Footer component generates a semantic HTML <footer>
 * element used to represent closing or supplementary content
 * for a document, page, section, article, or other content
 * grouping.
 *
 * Common uses include copyright information, author details,
 * contact information, related links, navigation, and legal
 * notices.
 *
 * A footer can belong to the overall document or to a specific
 * sectioning element such as Article or Section.
 *
 * @package RedSky\Html\Components\Layout
 */
class Footer extends HtmlComponent
{
    /**
     * Creates a new footer component.
     */
    public function __construct()
    {
        parent::__construct('footer');
    }
}