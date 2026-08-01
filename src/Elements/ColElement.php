<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML col element.
 *
 * The col element defines column properties
 * for table columns.
 *
 * @package RedSky\Html\Elements
 */
class ColElement extends HtmlElement
{
    /**
     * Creates a new col element.
     */
    public function __construct()
    {
        parent::__construct('col');
    }


    /**
     * Sets number of columns spanned.
     *
     * @param int $span
     *
     * @return static
     */
    public function span(
        int $span
    ): static {
        $this->setAttribute(
            'span',
            $span
        );

        return $this;
    }
}