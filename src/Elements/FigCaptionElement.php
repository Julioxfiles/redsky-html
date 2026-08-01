<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML figcaption element.
 *
 * The figcaption element provides a caption or
 * description for a figure element.
 *
 * @package RedSky\Html\Elements
 */
class FigCaptionElement extends HtmlElement
{
    /**
     * Creates a new figcaption element.
     */
    public function __construct()
    {
        parent::__construct('figcaption');
    }
}