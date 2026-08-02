<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML caption element.
 *
 * The caption element specifies the title
 * or description of a table. It must be the
 * first child of a table element and provides
 * context for the table's contents.
 *
 * @package RedSky\Html\Elements
 */
class CaptionElement extends HtmlElement
{
    /**
     * Creates a new caption element.
     */
    public function __construct()
    {
        parent::__construct('caption');
    }
}