<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML table body component.
 *
 * The TableBody component generates a semantic HTML
 * <tbody> element used to group the main data rows
 * of a table.
 *
 * Table rows are represented by TableRow components
 * and can be added individually or as a collection
 * using addRow() and addRows().
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
    title: 'Table Body',
    code: <<<'PHP'
    echo (new TableBody())
        ->addRows([
            (new TableRow())
                ->addCell(new TableCell('John Doe'))
                ->addCell(new TableCell('john@example.com')),
            (new TableRow())
                ->addCell(new TableCell('Jane Doe'))
                ->addCell(new TableCell('jane@example.com')),
        ])
        ->render();
    PHP,
    description: 'Creates a semantic table body containing
                 multiple data rows. Each row is represented
                 by a TableRow component.',
    language: 'php',
    primary: true,
    output: '<tbody><tr><td>John Doe</td><td>john@example.com</td></tr><tr><td>Jane Doe</td><td>jane@example.com</td></tr></tbody>'
)]
class TableBody extends HtmlComponent
{
    /**
     * Creates a new table body component.
     *
     * The component generates an HTML <tbody> element
     * intended to contain the main data rows of a table.
     */
    public function __construct()
    {
        parent::__construct('tbody');
    }


    /**
     * Adds a single table row.
     *
     * The supplied TableRow component is appended
     * to the table body.
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