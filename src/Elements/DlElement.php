<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML dl element.
 *
 * The dl element represents a description list.
 * It contains groups of terms and their associated
 * descriptions, typically using dt and dd elements.
 *
 * @package RedSky\Html\Elements
 */
class DlElement extends HtmlElement
{
    /**
     * Creates a new dl element.
     */
    public function __construct()
    {
        parent::__construct('dl');
    }
}