<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML main element.
 *
 * The main element contains the primary content
 * of a document.
 *
 * @package RedSky\Html\Elements
 */
class MainElement extends HtmlElement
{
    /**
     * Creates a new main element.
     */
    public function __construct()
    {
        parent::__construct('main');
    }
}