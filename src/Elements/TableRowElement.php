<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML table row element.
 *
 * The tr element defines a row inside a table.
 *
 * @package RedSky\Html\Elements
 */
class TableRowElement extends HtmlElement
{
    /**
     * Creates a new table row element.
     */
    public function __construct()
    {
        parent::__construct('tr');
    }
}