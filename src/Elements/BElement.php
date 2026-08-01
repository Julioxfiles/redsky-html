<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML b element.
 *
 * The b element represents text that should be
 * visually distinguished without implying extra
 * importance.
 *
 * @package RedSky\Html\Elements
 */
class BElement extends HtmlElement
{
    /**
     * Creates a new b element.
     */
    public function __construct()
    {
        parent::__construct('b');
    }
}