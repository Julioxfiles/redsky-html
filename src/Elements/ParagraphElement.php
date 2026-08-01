<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML paragraph element.
 *
 * The p element represents a paragraph of text.
 *
 * @package RedSky\Html\Elements
 */
class ParagraphElement extends HtmlElement
{
    /**
     * Creates a new paragraph element.
     */
    public function __construct()
    {
        parent::__construct('p');
    }
}