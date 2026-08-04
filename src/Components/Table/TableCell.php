<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML table cell component.
 *
 * The table cell component generates a semantic HTML
 * td element used to represent a data cell inside a
 * table row.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableCell extends HtmlComponent
{
    /**
     * Creates a new table cell component.
     *
     * @param mixed|null $content Cell content.
     */
    public function __construct(
        mixed $content = null
    ) {
        parent::__construct('td');

        if ($content !== null) {
            $this->setContent($content);
        }
    }


    /**
     * Sets the number of columns
     * this cell should span.
     *
     * @param int $columns
     *
     * @return static
     */
    public function colspan(
        int $columns
    ): static {
        return $this->attribute(
            'colspan',
            $columns
        );
    }


    /**
     * Sets the number of rows
     * this cell should span.
     *
     * @param int $rows
     *
     * @return static
     */
    public function rowspan(
        int $rows
    ): static {
        return $this->attribute(
            'rowspan',
            $rows
        );
    }
}