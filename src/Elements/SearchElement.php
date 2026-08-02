<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML search element.
 *
 * The search element represents a section of
 * a document that contains search controls or
 * a search interface. It provides semantic
 * meaning for search-related content.
 *
 * @package RedSky\Html\Elements
 */
class SearchElement extends HtmlElement
{
    /**
     * Creates a new search element.
     */
    public function __construct()
    {
        parent::__construct('search');
    }
}