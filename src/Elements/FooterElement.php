<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML footer element.
 *
 * The footer element represents footer content
 * for a document or section.
 *
 * @package RedSky\Html\Elements
 */
class FooterElement extends HtmlElement
{
    /**
     * Creates a new footer element.
     */
    public function __construct()
    {
        parent::__construct('footer');
    }
}