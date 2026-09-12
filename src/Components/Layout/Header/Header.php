<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Header;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <header> element.
 *
 * The Header component generates a semantic HTML <header>
 * element used to represent introductory or navigational
 * content for a document, page, section, or article.
 *
 * Common uses include page headings, logos, navigation menus,
 * search forms, introductory information, and other content
 * associated with the beginning of a section.
 *
 * A header can belong to the overall document or to a specific
 * sectioning element such as Article or Section.
 *
 * @package RedSky\Html\Components\Layout
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