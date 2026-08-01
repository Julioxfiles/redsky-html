<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML table head element.
 *
 * The thead element groups the header rows
 * of a table.
 *
 * @package RedSky\Html\Elements
 */
class TableHeadElement extends HtmlElement
{
    /**
     * Creates a new table head element.
     */
    public function __construct()
    {
        parent::__construct('thead');
    }
}