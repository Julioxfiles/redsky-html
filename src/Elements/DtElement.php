<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML dt element.
 *
 * The dt element represents a term, name,
 * or subject in a description list. It is
 * typically followed by one or more dd
 * elements containing its descriptions.
 *
 * @package RedSky\Html\Elements
 */
class DtElement extends HtmlElement
{
    /**
     * Creates a new dt element.
     */
    public function __construct()
    {
        parent::__construct('dt');
    }
}