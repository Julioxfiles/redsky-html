<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML table header cell component.
 *
 * The table header cell component generates a
 * semantic HTML th element used to represent
 * header information inside a table.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableHeaderCell extends HtmlComponent
{
    /**
     * Creates a new table header cell component.
     *
     * @param mixed|null $content Cell content.
     */
    public function __construct(
        mixed $content = null
    ) {
        parent::__construct('th');

        if ($content !== null) {
            $this->setContent($content);
        }
    }


    /**
     * Sets the header scope.
     *
     * Defines what cells the header applies to.
     *
     * Common values:
     * - col
     * - row
     * - colgroup
     * - rowgroup
     *
     * @param string $scope
     *
     * @return static
     */
    public function scope(
        string $scope
    ): static {
        return $this->attribute(
            'scope',
            $scope
        );
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