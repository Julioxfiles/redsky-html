<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table\TableFooter;

use RedSky\Html\Components\HtmlComponent;

use RedSky\Html\Components\Table\TableRow\TableRow;

/**
 * Represents an HTML table footer component.
 *
 * The TableFooter component generates a semantic HTML
 * <tfoot> element used to group footer rows inside a table.
 *
 * Table rows are represented by TableRow components and
 * can be added individually or as a collection using
 * addRow() and addRows().
 *
 * A table footer is commonly used for summary information,
 * totals, or other content associated with the table data.
 *
 * Common attributes and child-management methods inherited
 * from HtmlComponent can also be used, including class(),
 * style(), attribute(), addChild(), render(), and __toString().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableFooter extends HtmlComponent
{
    /**
     * Creates a new table footer component.
     *
     * The component generates an HTML <tfoot> element
     * intended to contain footer rows.
     */
    public function __construct()
    {
        parent::__construct('tfoot');
    }


    /**
     * Adds a single table row.
     *
     * The supplied TableRow component is appended
     * to the table footer.
     *
     * @param TableRow $row Table row to add.
     *
     * @return static
     */
    public function addRow(
        TableRow $row
    ): static {
        return $this->addChild(
            $row
        );
    }


    /**
     * Adds multiple table rows.
     *
     * Rows are added in the same order in which they
     * appear in the supplied array.
     *
     * @param array<int, TableRow> $rows Table rows to add.
     *
     * @return static
     */
    public function addRows(
        array $rows
    ): static {
        foreach ($rows as $row) {
            $this->addRow(
                $row
            );
        }

        return $this;
    }
}