<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

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
#[Example(
    title: 'Table Footer',
    code: <<<'PHP'
    echo (new TableFooter())
        ->addRow(
            (new TableRow())
                ->addCell(new TableCell('Total'))
                ->addCell(new TableCell('$1,500'))
        )
        ->render();
    PHP,
    description: 'Creates a semantic table footer containing
                 a row with summary information for the table.',
    language: 'php',
    primary: true,
    output: '<tfoot><tr><td>Total</td><td>$1,500</td></tr></tfoot>'
)]
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