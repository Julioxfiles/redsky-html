<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML unordered list element.
 *
 * The ul element defines an unordered list of items.
 *
 * @package RedSky\Html\Elements
 */
class UnorderedListElement extends HtmlElement
{
    /**
     * Creates a new unordered list element.
     */
    public function __construct()
    {
        parent::__construct('ul');
    }
}