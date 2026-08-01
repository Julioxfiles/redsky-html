<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML section element.
 *
 * The section element defines a thematic grouping
 * of content, typically with a heading.
 *
 * @package RedSky\Html\Elements
 */
class SectionElement extends HtmlElement
{
    /**
     * Creates a new section element.
     */
    public function __construct()
    {
        parent::__construct('section');
    }
}