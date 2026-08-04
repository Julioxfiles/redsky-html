<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML table row component.
 *
 * The table row component generates a semantic
 * HTML tr element used to group table cells.
 *
 * Cells should be added using TableCell or
 * TableHeaderCell components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableRow extends HtmlComponent
{
    /**
     * Creates a new table row component.
     */
    public function __construct()
    {
        parent::__construct('tr');
    }


    /**
     * Adds a data cell.
     *
     * @param TableCell $cell
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
     * @param array<int, TableCell> $cells
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
     * Adds a header cell.
     *
     * @param TableHeaderCell $cell
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
     * @param array<int, TableHeaderCell> $cells
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