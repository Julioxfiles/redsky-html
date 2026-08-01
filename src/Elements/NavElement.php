<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML navigation element.
 *
 * The nav element contains navigation links
 * for a document or application.
 *
 * @package RedSky\Html\Elements
 */
class NavElement extends HtmlElement
{
    /**
     * Creates a new nav element.
     */
    public function __construct()
    {
        parent::__construct('nav');
    }
}