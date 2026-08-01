<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML table body element.
 *
 * The tbody element groups the body content
 * of a table.
 *
 * @package RedSky\Html\Elements
 */
class TableBodyElement extends HtmlElement
{
    /**
     * Creates a new table body element.
     */
    public function __construct()
    {
        parent::__construct('tbody');
    }
}