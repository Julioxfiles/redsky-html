<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML summary element.
 *
 * The summary element defines the visible heading
 * for a details element.
 *
 * @package RedSky\Html\Elements
 */
class SummaryElement extends HtmlElement
{
    /**
     * Creates a new summary element.
     */
    public function __construct()
    {
        parent::__construct('summary');
    }
}