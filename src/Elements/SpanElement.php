<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML span element.
 *
 * The span element is an inline generic container used
 * to group text or small portions of content.
 *
 * @package RedSky\Html\Elements
 */
class SpanElement extends HtmlElement
{
    /**
     * Creates a new span element.
     */
    public function __construct()
    {
        parent::__construct('span');
    }
}