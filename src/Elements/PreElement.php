<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML pre element.
 *
 * The pre element represents preformatted
 * text. Content inside this element is
 * displayed using a fixed-width font and
 * preserves whitespace, line breaks, and
 * formatting exactly as written in the source.
 *
 * It is commonly used for displaying source
 * code, terminal output, and formatted text.
 *
 * @package RedSky\Html\Elements
 */
class PreElement extends HtmlElement
{
    /**
     * Creates a new pre element.
     */
    public function __construct()
    {
        parent::__construct('pre');
    }
}