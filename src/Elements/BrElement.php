<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML br element.
 *
 * The br element represents a line break.
 *
 * This is a void element and does not contain
 * closing tags or child elements.
 *
 * @package RedSky\Html\Elements
 */
class BrElement extends HtmlElement
{
    /**
     * Creates a new br element.
     */
    public function __construct()
    {
        parent::__construct('br');
    }
}