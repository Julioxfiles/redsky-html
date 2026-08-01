<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML table cell element.
 *
 * The td element defines a standard data cell
 * inside a table row.
 *
 * @package RedSky\Html\Elements
 */
class TableCellElement extends HtmlElement
{
    /**
     * Creates a new table cell element.
     */
    public function __construct()
    {
        parent::__construct('td');
    }


    /**
     * Sets column span.
     *
     * @param int $span
     *
     * @return static
     */
    public function colspan(
        int $span
    ): static {
        $this->setAttribute(
            'colspan',
            $span
        );

        return $this;
    }


    /**
     * Sets row span.
     *
     * @param int $span
     *
     * @return static
     */
    public function rowspan(
        int $span
    ): static {
        $this->setAttribute(
            'rowspan',
            $span
        );

        return $this;
    }
}