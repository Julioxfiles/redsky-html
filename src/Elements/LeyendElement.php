<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML legend element.
 *
 * The legend element defines a caption for a
 * fieldset element.
 *
 * @package RedSky\Html\Elements
 */
class LegendElement extends HtmlElement
{
    /**
     * Creates a new legend element.
     */
    public function __construct()
    {
        parent::__construct('legend');
    }
}