<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML table body component.
 *
 * The table body component generates a semantic
 * HTML tbody element used to group the main rows
 * of a table.
 *
 * Rows should be added using TableRow components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableBody extends HtmlComponent
{
    /**
     * Creates a new table body component.
     */
    public function __construct()
    {
        parent::__construct('tbody');
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