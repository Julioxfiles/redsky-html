<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML table footer element.
 *
 * The tfoot element groups footer rows
 * of an HTML table.
 *
 * @package RedSky\Html\Elements
 */
class TableFooterElement extends HtmlElement
{
    /**
     * Creates a new table footer element.
     */
    public function __construct()
    {
        parent::__construct('tfoot');
    }
}