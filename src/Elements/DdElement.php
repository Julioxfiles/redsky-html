<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML dd element.
 *
 * The dd element represents the description,
 * definition, or value associated with a term
 * in a description list. It is used together
 * with the dl and dt elements.
 *
 * @package RedSky\Html\Elements
 */
class DdElement extends HtmlElement
{
    /**
     * Creates a new dd element.
     */
    public function __construct()
    {
        parent::__construct('dd');
    }
}