<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML table header cell element.
 *
 * The th element defines a header cell inside a table.
 *
 * @package RedSky\Html\Elements
 */
class TableHeaderCellElement extends HtmlElement
{
    /**
     * Creates a new table header cell element.
     */
    public function __construct()
    {
        parent::__construct('th');
    }


    /**
     * Sets column span.
     *
     * @param int $span
     *
     * @return static
     */
    public function colspan(
        int $span
    ): static {
        $this->setAttribute(
            'colspan',
            $span
        );

        return $this;
    }


    /**
     * Sets row span.
     *
     * @param int $span
     *
     * @return static
     */
    public function rowspan(
        int $span
    ): static {
        $this->setAttribute(
            'rowspan',
            $span
        );

        return $this;
    }


    /**
     * Sets header scope.
     *
     * @param string $scope
     *
     * @return static
     */
    public function scope(
        string $scope
    ): static {
        $this->setAttribute(
            'scope',
            $scope
        );

        return $this;
    }
}