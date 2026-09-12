<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Row;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a layout row that contains child components.
 *
 * The Row component provides a generic, UI-library-agnostic container
 * for arranging components horizontally or according to the layout
 * rules applied by the selected UI library.
 *
 * A Row can contain individual components or multiple components
 * supplied as an array.
 *
 * @package RedSky\Html\Components\Layout
 */
final class Row extends HtmlComponent
{
    /**
     * Create a new Row component.
     */
    public function __construct()
    {
        parent::__construct('div');

        $this->attribute('data-redsky-component', 'row');
    }

    /**
     * Add a single column to the row.
     *
     * @param HtmlComponent $column The component to add to the row.
     *
     * @return static
     */
    public function addColumn(HtmlComponent $column): static
    {
        return $this->addChild($column);
    }

    /**
     * Add multiple columns to the row.
     *
     * Each element in the array must be a Component instance.
     *
     * @param HtmlComponent[] $columns The columns to add to the row.
     *
     * @return static
     */
    public function addColumns(array $columns): static
    {
        foreach ($columns as $column) {
            $this->addColumn($column);
        }

        return $this;
    }

    /**
     * Add columns to the row from an array.
     *
     * This method provides a convenient, expressive alternative
     * to calling addColumns().
     *
     * Existing children are preserved.
     *
     * @param Component[] $columns The columns to add to the row.
     *
     * @return static
     */
    public function columns(array $columns): static
    {
        return $this->addColumns($columns);
    }
}
