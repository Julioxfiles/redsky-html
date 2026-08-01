<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML table element.
 *
 * The table element represents tabular data
 * arranged in rows and columns.
 *
 * @package RedSky\Html\Elements
 */
class TableElement extends HtmlElement
{
    /**
     * Creates a new table element.
     */
    public function __construct()
    {
        parent::__construct('table');
    }


    /**
     * Sets table border attribute.
     *
     * @param int|string $border
     *
     * @return static
     */
    public function border(
        int|string $border
    ): static {
        $this->setAttribute(
            'border',
            $border
        );

        return $this;
    }


    /**
     * Sets table responsive role.
     *
     * @return static
     */
    public function responsive(): static
    {
        $this->setAttribute(
            'role',
            'table'
        );

        return $this;
    }
}