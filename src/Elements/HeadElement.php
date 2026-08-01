<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML head element.
 *
 * The head element contains metadata and resources
 * related to the document.
 *
 * @package RedSky\Html\Elements
 */
class HeadElement extends HtmlElement
{
    /**
     * Creates a new head element.
     */
    public function __construct()
    {
        parent::__construct('head');
    }
}