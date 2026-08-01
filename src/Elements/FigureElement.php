<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML figure element.
 *
 * The figure element represents self-contained content,
 * such as images, diagrams, or illustrations.
 *
 * @package RedSky\Html\Elements
 */
class FigureElement extends HtmlElement
{
    /**
     * Creates a new figure element.
     */
    public function __construct()
    {
        parent::__construct('figure');
    }
}