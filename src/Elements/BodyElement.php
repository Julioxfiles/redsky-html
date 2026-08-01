<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML body element.
 *
 * The body element contains the visible content
 * of an HTML document.
 *
 * @package RedSky\Html\Elements
 */
class BodyElement extends HtmlElement
{
    /**
     * Creates a new body element.
     */
    public function __construct()
    {
        parent::__construct('body');
    }
}