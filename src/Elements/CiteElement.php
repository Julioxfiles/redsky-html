<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML cite element.
 *
 * The cite element represents the title of a
 * creative work such as a book, article, movie,
 * song, or other referenced work.
 *
 * @package RedSky\Html\Elements
 */
class CiteElement extends HtmlElement
{
    /**
     * Creates a new cite element.
     */
    public function __construct()
    {
        parent::__construct('cite');
    }
}