<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML table footer component.
 *
 * The table footer component generates a semantic
 * HTML tfoot element used to group footer rows
 * inside a table.
 *
 * Rows should be added using TableRow components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableFooter extends HtmlComponent
{
    /**
     * Creates a new table footer component.
     */
    public function __construct()
    {
        parent::__construct('tfoot');
    }


    /**
     * Adds a table row.
     *
     * @param TableRow $row
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
     * @param array<int, TableRow> $rows
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