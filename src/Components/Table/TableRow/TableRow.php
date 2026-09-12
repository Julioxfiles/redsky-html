<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table\TableRow;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML table row component.
 *
 * The TableRow component generates a semantic HTML
 * <tr> element used to group table cells within a
 * table section.
 *
 * Data cells are represented by TableCell components,
 * while header cells are represented by
 * TableHeaderCell components.
 *
 * Cells can be added individually or as collections
 * using addCell(), addCells(), addHeaderCell(), and
 * addHeaderCells().
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
    title: 'Table Row',
    code: <<<'PHP'
    echo (new TableRow())
        ->addHeaderCell(
            (new TableHeaderCell('Name'))
                ->scope('col')
        )
        ->addHeaderCell(
            (new TableHeaderCell('Email'))
                ->scope('col')
        )
        ->render();
    PHP,
    description: 'Creates a semantic table row containing
                 header cells. TableRow can also contain
                 data cells using TableCell components.',
    language: 'php',
    primary: true,
    output: '<tr><th scope="col">Name</th><th scope="col">Email</th></tr>'
)]
class TableRow extends HtmlComponent
{
    /**
     * Creates a new table row component.
     *
     * The component generates an HTML <tr> element
     * intended to contain table data or header cells.
     */
    public function __construct()
    {
        parent::__construct('tr');
    }


    /**
     * Adds a single data cell.
     *
     * The supplied TableCell component is appended
     * to the row.
     *
     * @param TableCell $cell Data cell to add.
     *
     * @return static
     */
    public function addCell(
        TableCell $cell
    ): static {
        return $this->addChild(
            $cell
        );
    }


    /**
     * Adds multiple data cells.
     *
     * Cells are added in the same order in which they
     * appear in the supplied array.
     *
     * @param array<int, TableCell> $cells Data cells to add.
     *
     * @return static
     */
    public function addCells(
        array $cells
    ): static {
        foreach ($cells as $cell) {
            $this->addCell(
                $cell
            );
        }

        return $this;
    }


    /**
     * Adds a single header cell.
     *
     * The supplied TableHeaderCell component is appended
     * to the row.
     *
     * @param TableHeaderCell $cell Header cell to add.
     *
     * @return static
     */
    public function addHeaderCell(
        TableHeaderCell $cell
    ): static {
        return $this->addChild(
            $cell
        );
    }


    /**
     * Adds multiple header cells.
     *
     * Header cells are added in the same order in which
     * they appear in the supplied array.
     *
     * @param array<int, TableHeaderCell> $cells Header cells to add.
     *
     * @return static
     */
    public function addHeaderCells(
        array $cells
    ): static {
        foreach ($cells as $cell) {
            $this->addHeaderCell(
                $cell
            );
        }

        return $this;
    }
}