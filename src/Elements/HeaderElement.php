<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML header element.
 *
 * The header element represents introductory content,
 * navigation aids, or a group of headings.
 *
 * @package RedSky\Html\Elements
 */
class HeaderElement extends HtmlElement
{
    /**
     * Creates a new header element.
     */
    public function __construct()
    {
        parent::__construct('header');
    }
}