<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;

/**
 * DataTable component.
 *
 * Provides a high-level table builder that generates
 * table headers and rows from structured data.
 *
 * The component creates a Table internally using:
 *
 * - TableHead
 * - TableBody
 * - TableRow
 * - TableHeaderCell
 * - TableCell
 *
 * @package RedSky\Html\Components\Table
 */
class DataTable extends HtmlComponent
{
    /**
     * Table column definitions.
     *
     * @var array<string, string>
     */
    protected array $columns = [];

    /**
     * Table row data.
     *
     * @var array<int, array<string, mixed>>
     */
    protected array $rows = [];

    /**
     * Sets the table caption.
     *
     * Accepts either a TableCaption component or a string value.
     *
     * Example:
     *
     * ->caption('Users')
     *
     * @param TableCaption|string $caption
     *
     * @return static
     */
    public function caption(
        TableCaption|string $caption
    ): static {
        if (is_string($caption)) {
            $caption = new TableCaption($caption);
        }

        return $this->addChild($caption);
    }

    /**
     * Sets table columns.
     *
     * Each array key represents the data field name
     * and each value represents the displayed column title.
     *
     * Example:
     *
     * [
     *     'id' => 'ID',
     *     'name' => 'Name',
     *     'email' => 'Email',
     * ]
     *
     * @param array<string, string> $columns
     *
     * @return static
     */
    public function columns(
        array $columns
    ): static {
        $this->columns = $columns;

        return $this;
    }


    /**
     * Sets table row data.
     *
     * Each row should be an associative array where
     * keys match the column definitions.
     *
     * Example:
     *
     * [
     *     [
     *         'id' => 1,
     *         'name' => 'John Smith',
     *         'email' => 'john@example.com',
     *     ],
     * ]
     *
     * @param array<int, array<string, mixed>> $rows
     *
     * @return static
     */
    public function rows(
        array $rows
    ): static {
        $this->rows = $rows;

        return $this;
    }


    /**
     * Renders the DataTable HTML output.
     *
     * Generates table header cells from columns
     * and table rows from provided data.
     *
     * @return string
     */
    public function render(): string
    {
        $table = new Table();

        foreach ($this->attributes() as $name => $value) {
            $table->attribute($name, $value);
        }

        foreach ($this->children() as $child) {
            $table->addChild($child);
        }

        $table->addChild(
            $this->buildHead()
        );

        $table->addChild(
            $this->buildBody()
        );

        return $table->render();
    }

    /**
     * Builds the table header.
     *
     * Creates a TableHead component using the
     * configured column definitions.
     *
     * @return TableHead
     */
    private function buildHead(): TableHead
    {
        $head = new TableHead();

        $row = new TableRow();

        foreach ($this->columns as $title) {
            $row->addChild(
                new TableHeaderCell($title)
            );
        }

        $head->addChild($row);

        return $head;
    }


    /**
     * Builds the table body.
     *
     * Creates table rows and cells from the
     * configured row data.
     *
     * @return TableBody
     */
    private function buildBody(): TableBody
    {
        $body = new TableBody();

        foreach ($this->rows as $row) {
            $tableRow = new TableRow();

            foreach ($this->columns as $field => $title) {
                $tableRow->addChild(
                    new TableCell(
                        (string) ($row[$field] ?? '')
                    )
                );
            }

            $body->addChild($tableRow);
        }

        return $body;
    }
}