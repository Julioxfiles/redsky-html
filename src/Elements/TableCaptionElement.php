<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML table caption element.
 *
 * The caption element defines the title or
 * description of a table.
 *
 * @package RedSky\Html\Elements
 */
class TableCaptionElement extends HtmlElement
{
    /**
     * Creates a new table caption element.
     */
    public function __construct()
    {
        parent::__construct('caption');
    }
}