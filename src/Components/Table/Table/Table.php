<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table\Table;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML table component.
 *
 * The Table component generates a semantic HTML <table>
 * element used to organize and present tabular data.
 *
 * A table can contain a caption, header section, body
 * section, and footer section through the corresponding
 * TableCaption, TableHead, TableBody, and TableFooter
 * components.
 *
 * Sections are added using caption(), head(), body(), and
 * footer(), allowing a table structure to be built through
 * fluent method chaining.
 *
 * Tables can also be populated dynamically using columns(),
 * rows(), or fromArray().
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
class Table extends HtmlComponent
{
    /**
     * Field names used by the dynamic table columns.
     *
     * @var array<int, string>
     */
    protected array $columnFields = [];


    /**
     * Creates a new table component.
     *
     * The component generates an HTML <table> element
     * that can contain the different semantic sections
     * of a tabular data structure.
     */
    public function __construct()
    {
        parent::__construct('table');
    }


    /**
     * Adds a table caption.
     *
     * The caption describes the purpose or subject
     * of the table.
     *
     * @param TableCaption $caption Table caption component.
     *
     * @return static
     */
    public function caption(
        TableCaption $caption
    ): static {
        return $this->addChild(
            $caption
        );
    }


    /**
     * Adds a table head section.
     *
     * The table head normally contains column headers
     * represented by TableHeaderCell components.
     *
     * @param TableHead $head Table head component.
     *
     * @return static
     */
    public function head(
        TableHead $head
    ): static {
        return $this->addChild(
            $head
        );
    }


    /**
     * Adds a table body section.
     *
     * The table body contains the primary data rows
     * of the table.
     *
     * @param TableBody $body Table body component.
     *
     * @return static
     */
    public function body(
        TableBody $body
    ): static {
        return $this->addChild(
            $body
        );
    }


    /**
     * Adds a table footer section.
     *
     * The table footer can contain summary rows or
     * other information associated with the table data.
     *
     * @param TableFooter $footer Table footer component.
     *
     * @return static
     */
    public function footer(
        TableFooter $footer
    ): static {
        return $this->addChild(
            $footer
        );
    }


    /**
     * Defines the columns of the table.
     *
     * The array key represents the field name used to retrieve
     * values from each data row, while the array value represents
     * the displayed column heading.
     *
     * Example:
     *
     * [
     *     'name'  => 'Name',
     *     'email' => 'Email',
     * ]
     *
     * @param array<string, string> $columns Column definitions.
     *
     * @return static
     */
    public function columns(
        array $columns
    ): static {
        $this->columnFields = array_keys($columns);

        $row = new TableRow();

        foreach ($columns as $title) {
            $row->addHeaderCell(
                new TableHeaderCell($title)
            );
        }

        $this->head(
            (new TableHead())
                ->addRow($row)
        );

        return $this;
    }


    /**
     * Adds table body rows from an array of data.
     *
     * Each data row should be an associative array whose keys
     * correspond to the field names defined by columns().
     *
     * Example:
     *
     * [
     *     [
     *         'name'  => 'John Doe',
     *         'email' => 'john@example.com',
     *     ],
     *     [
     *         'name'  => 'Jane Smith',
     *         'email' => 'jane@example.com',
     *     ],
     * ]
     *
     * @param array<int, array<string, mixed>> $rows Table data.
     *
     * @return static
     */
    public function rows(
        array $rows
    ): static {
        $body = new TableBody();

        foreach ($rows as $dataRow) {
            $row = new TableRow();

            foreach ($this->columnFields() as $field) {
                $value = $dataRow[$field] ?? '';

                $row->addCell(
                    new TableCell($value)
                );
            }

            $body->addRow($row);
        }

        return $this->body(
            $body
        );
    }


    /**
     * Creates a complete table from column definitions
     * and data rows.
     *
     * This is a convenience method equivalent to:
     *
     *     $table
     *         ->columns($columns)
     *         ->rows($rows);
     *
     * @param array<string, string> $columns Column definitions.
     * @param array<int, array<string, mixed>> $rows Table data.
     *
     * @return static
     */
    public function fromArray(
        array $columns,
        array $rows
    ): static {
        return $this
            ->columns($columns)
            ->rows($rows);
    }


    /**
     * Returns the field names from the current column definition.
     *
     * @return array<int, string>
     */
    protected function columnFields(): array
    {
        return $this->columnFields;
    }
}
