<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML colgroup element.
 *
 * The colgroup element defines a group of columns
 * within a table for applying shared properties.
 *
 * @package RedSky\Html\Elements
 */
class ColGroupElement extends HtmlElement
{
    /**
     * Creates a new colgroup element.
     */
    public function __construct()
    {
        parent::__construct('colgroup');
    }
}