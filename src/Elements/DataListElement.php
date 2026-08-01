<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML datalist element.
 *
 * The datalist element provides a list of predefined
 * options for an input element.
 *
 * @package RedSky\Html\Elements
 */
class DatalistElement extends HtmlElement
{
    /**
     * Creates a new datalist element.
     */
    public function __construct()
    {
        parent::__construct('datalist');
    }
}