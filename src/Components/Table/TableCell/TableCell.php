<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table\TableCell;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML table cell component.
 *
 * The TableCell component generates a semantic HTML <td>
 * element used to represent a data cell inside a table row.
 *
 * Cell content can be provided through the constructor.
 * The cell can span multiple columns or rows using
 * colspan() and rowspan().
 *
 * Common attributes and content methods inherited from
 * HtmlComponent can also be used, including class(),
 * style(), attribute(), addChild(), text(), html(),
 * render(), and __toString().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableCell extends HtmlComponent
{
    /**
     * Creates a new table cell component.
     *
     * When content is provided, it is assigned as the
     * content of the table cell.
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
     * Sets the number of columns this cell should span.
     *
     * The value is assigned to the HTML colspan attribute.
     *
     * @param int $columns Number of columns to span.
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
     * Sets the number of rows this cell should span.
     *
     * The value is assigned to the HTML rowspan attribute.
     *
     * @param int $rows Number of rows to span.
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