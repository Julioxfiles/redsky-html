<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML div element.
 *
 * The div element is a generic block-level container
 * used to group content and apply attributes.
 *
 * @package RedSky\Html\Elements
 */
class DivElement extends HtmlElement
{
    /**
     * Creates a new div element.
     */
    public function __construct()
    {
        parent::__construct('div');
    }
}