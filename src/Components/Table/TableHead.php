<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML table head component.
 *
 * The TableHead component generates a semantic HTML
 * <thead> element used to group header rows inside
 * a table.
 *
 * Table rows are represented by TableRow components
 * and can be added individually or as a collection
 * using addRow() and addRows().
 *
 * Header rows normally contain TableHeader components
 * representing the column headings of the table.
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
    title: 'Table Head',
    code: <<<'PHP'
    echo (new TableHead())
        ->addRow(
            (new TableRow())
                ->addHeader(new TableHeader('Name'))
                ->addHeader(new TableHeader('Email'))
        )
        ->render();
    PHP,
    description: 'Creates a semantic table header section containing
                 a row of column headings. Header rows are represented
                 by TableRow components.',
    language: 'php',
    primary: true,
    output: '<thead><tr><th>Name</th><th>Email</th></tr></thead>'
)]
class TableHead extends HtmlComponent
{
    /**
     * Creates a new table head component.
     *
     * The component generates an HTML <thead> element
     * intended to contain one or more header rows.
     */
    public function __construct()
    {
        parent::__construct('thead');
    }


    /**
     * Adds a single table row.
     *
     * The supplied TableRow component is appended
     * to the table head.
     *
     * @param TableRow $row Table header row to add.
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
     * @param array<int, TableRow> $rows Table header rows to add.
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